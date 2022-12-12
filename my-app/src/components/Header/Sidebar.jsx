import React, { useState } from "react";
import {
  Drawer,
  // DrawerBody,
  // DrawerFooter,
  DrawerOverlay,
  DrawerContent,
  DrawerCloseButton,
  Button,
  Box,
  useDisclosure,
  // DrawerHeader,
} from "@chakra-ui/react";
import { Menu, MenuItem, SubMenu } from "react-pro-sidebar";

import { BiMenu } from "react-icons/bi";
import { Link } from "react-router-dom";

const Sidebar = () => {
  const { isOpen, onOpen, onClose } = useDisclosure();
  const btnRef = React.useRef();
  return (
    <>
      <Button
        ref={btnRef}
        colorScheme="none"
        fontSize={"30px"}
        onClick={onOpen}
      >
        <BiMenu />
      </Button>
      <Drawer
        isOpen={isOpen}
        placement="left"
        onClose={onClose}
        finalFocusRef={btnRef}
        transition={"width, 0.1s linear"}
        scrollBehavior={"inside"}
        blockScrollOnMount={false}
      >
        <DrawerOverlay />

        <DrawerContent
          maxWidth={"300px !important"}
          marginTop={"60px !important"}
          scrollBehavior={"smooth"}
          boxShadow={
            "rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px"
          }
          transition={"width, 0.1s linear"}
          padding={"0 !important"}
          // backgroundColor={"#2F3542"}
        >
          <DrawerCloseButton />
          {/* <DrawerHeader>Create your account</DrawerHeader> */}

          {/* {/* <DrawerBody> */}
          <Box marginTop={"50px"}>
            {/* <Link>National</Link> */}
            <Menu>
              <SubMenu label="National">
                <MenuItem>
                  <Link>Lumbini Province</Link>
                </MenuItem>
                <MenuItem>
                  <Link>Bagmati Province</Link>
                </MenuItem>
                <MenuItem>
                  <Link>National Security</Link>
                </MenuItem>
                <MenuItem>
                  <Link> Province No. 1</Link>
                </MenuItem>
                <MenuItem>
                  <Link>Gandaki Province</Link>
                </MenuItem>
                <MenuItem>
                  <Link>Karnali Province</Link>
                </MenuItem>
                <MenuItem>
                  <Link>Sudurpaschim Province </Link>
                </MenuItem>
              </SubMenu>
              <MenuItem>
                <Link>Politics</Link>
              </MenuItem>
              <MenuItem>
                <Link>Sports</Link>
              </MenuItem>
            </Menu>
          </Box>
          {/* </DrawerBody> */}

          {/* <DrawerFooter>
            <Button variant="outline" mr={3} onClick={onClose}>
              Cancel
            </Button>
            <Button colorScheme="blue">Save</Button>
          </DrawerFooter> */}
        </DrawerContent>
      </Drawer>
    </>
  );
};
export default Sidebar;
