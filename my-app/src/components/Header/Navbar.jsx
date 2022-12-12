import { Avatar, Box, HStack } from "@chakra-ui/react";
import React from "react";
// import { BiMenu } from "react-icons/bi";
import { Button } from "@chakra-ui/react";
import { Link } from "react-router-dom";
import Sidebar from "./Sidebar";
import Cosmos from "../CosmosTimes.jsx/Cosmos";
const Navbar = () => {
  return (
    <>
      <Box
        width={"100vw"}
        lineHeight={"60px"}
        bg={"black"}
        position={"sticky"}
        top={"0"}
      >
        <HStack justifyContent={"space-between"}>
          <HStack alignItems={"center"}>
            <Button
              colorScheme="none"
              variant={"ghost"}
              fontSize={"3xl"}
              color={"white"}
            >
              {/* <BiMenu /> */}
              <Sidebar />
            </Button>
            <HStack
              width={"25%"}
              justifyContent={"space-between"}
              alignItems={"center"}
              color={"white"}
              visibility={["hidden", "visible"]}
            >
              <Link to={"/"}>Home</Link>
              <Link to={"/link1"}>Home</Link>
              <Link to={"/link2"}>Home</Link>
              <Link to={"/link3"}>Home</Link>
              <Link to={"/link4"}>Home</Link>
              <Link to={"/horoscope"}>Horoscope</Link>
            </HStack>
          </HStack>
          <HStack
            paddingRight={"50px"}
            cursor={"pointer"}
            visibility={["hidden", "visible"]}
          >
            <Avatar />
          </HStack>
        </HStack>
      </Box>
      <Box maxW={"1230px "} margin={"0 auto"} padding={"0 30px"}>
        <Cosmos />
      </Box>
    </>
  );
};

export default Navbar;
