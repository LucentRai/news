import { Box, Heading, HStack, Stack, Text } from "@chakra-ui/react";
import React, { useState, useEffect } from "react";
import Weather from "./Weather";

const Cosmos = () => {
  const weekday = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
  ];
  const monthsName = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];
  const [date, setDate] = useState(new Date());
  useEffect(() => {
    let timer = setInterval(() => setDate(new Date()), 1000);
    return function cleanup() {
      clearInterval(timer);
    };
  });
  let dayName = weekday[date.getDay()];
  let day = date.getDate();
  let month = monthsName[date.getMonth()];
  let year = date.getFullYear();
  let time = date.toLocaleTimeString();

  // ****************************
  return (
    <Box marginBottom={"10"} textAlign={"center"}>
      <Heading
        fontFamily={"'Wilson wells'"}
        fontSize={["30px", "55px", "70px", "85px"]}
        margin={"10px 0"}
      >
        The Cosmos Times
      </Heading>
      <Stack
        justifyContent={["center", "space-between"]}
        alignItems={"center"}
        flexDir={["column", "column", "row"]}
      >
        <HStack>
          <Text>{dayName + " ,"}</Text>
          <Text>{day}</Text>
          <Text>{month}</Text>
          <Text>{year}</Text>
        </HStack>
        <HStack>
          <Text textAlign={"center"}>{time}</Text>
        </HStack>
        <HStack>
          <Weather />
        </HStack>
      </Stack>
      <hr />
    </Box>
  );
};

export default Cosmos;
