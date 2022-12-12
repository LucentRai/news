import React, { useState, useEffect } from "react";
import { HStack, Text } from "@chakra-ui/react";
import axios from "axios";

const Weather = () => {
  const [lat, setLat] = useState([]);
  const [long, setLong] = useState([]);
  const [temperature, setTemperature] = useState("");
  const [location, setLocation] = useState("");
  // ***
  useEffect(() => {
    const fetchData = async () => {
      navigator.geolocation.getCurrentPosition(function (position) {
        setLat(position.coords.latitude);
        setLong(position.coords.longitude);
      });
      try {
        const res = await axios(
          `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${long}&appid=bf7612d6e42375e9170685b09b8d3723`
        );
        console.log(res);
        setTemperature(res.data.main.temp);
        setLocation(res.data.name);
      } catch (error) {}
    };
    fetchData();
  }, [lat, long]);

  return (
    <>
      <HStack>
        <Text>{location + " ,"}</Text>
        <Text>{(temperature - 273).toFixed(2) + "°C"}</Text>
      </HStack>
    </>
  );
};

export default Weather;
