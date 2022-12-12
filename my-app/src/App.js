import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Navbar from "./components/Header/Navbar";
import Footer from "./components/Footer/Footer";
import Home from "./Pages/Home";
import { Box } from "@chakra-ui/react";
import "./App.css";
// import toast, { Toaster } from "react-hot-toast";
// import Cosmos from "./components/CosmosTimes.jsx/Cosmos";

const App = () => {
  return (
    <BrowserRouter>
      <Navbar />
      <Box maxW={"1230px "} margin={"0 auto"}>
        <Routes>
          <Route path="/" element={<Home />} />
        </Routes>
      </Box>
      <Footer />
    </BrowserRouter>
  );
};

export default App;
