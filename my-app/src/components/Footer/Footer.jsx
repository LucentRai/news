import {
  Box,
  Grid,
  GridItem,
  Heading,
  Link,
  Input,
  VStack,
  Text,
  Button,
  Stack,
  HStack,
} from "@chakra-ui/react";
import toast, { Toaster } from "react-hot-toast";

import React from "react";
const Footer = () => {
  const hoverOnLink = {
    textDecoration: "none",
    opacity: "0.5",
  };
  const sucessNotify = () => {
    toast.success("Sucess!");
  };
  return (
    <>
      <Box bg={"#F7FAFC"} margin={"50px 0"}>
        <Box maxW={"1230px"} margin={"0 auto"} padding={"0 30px 30px 30px"}>
          <Grid
            gridTemplateColumns={["1fr", "repeat(2,1fr)", "repeat(4,1fr)"]}
            rowGap={"50px"}
            padding={" 50px 0"}
            margin={"0 auto"}
            justifyItems={{ base: "center", md: "start", lg: "start" }}
            borderBottom={"5px solid black"}
          >
            <GridItem>
              <VStack alignItems={"start"}>
                <Heading size={"md"}>Company</Heading>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
              </VStack>
            </GridItem>
            <GridItem>
              <VStack alignItems={"start"}>
                <Heading size={"md"}>Company</Heading>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
              </VStack>
            </GridItem>
            <GridItem>
              <VStack alignItems={"start"}>
                <Heading size={"md"}>Company</Heading>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
                <Link _hover={{ ...hoverOnLink }}>About Us</Link>
              </VStack>
            </GridItem>
            <GridItem>
              <VStack
                // alignItems={"start"}
                alignItems={["center", "start", "start"]}
              >
                <Heading size={"md"}>News Letter</Heading>
                <Text>
                  We believe that great journalism has the power to make each
                  reader's life richer and more fulfilling and all of society
                  stronger and more just.{" "}
                </Text>
                <Stack flexDir={["column"]}>
                  {/* <Box> */}
                  <Input type={"email"} placeholder={"enter email"} />
                  <Button
                    type="submit"
                    colorScheme={"blue"}
                    onClick={sucessNotify}
                  >
                    Subscribe
                  </Button>
                  {/* </Box> */}
                </Stack>
              </VStack>
            </GridItem>
          </Grid>
          <HStack>
            <Text>Copyright@-----</Text>
          </HStack>
        </Box>
      </Box>
    </>
  );
};

export default Footer;
