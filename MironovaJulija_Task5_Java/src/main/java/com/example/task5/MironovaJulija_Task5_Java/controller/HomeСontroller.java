package com.example.task5.MironovaJulija_Task5_Java.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody; 
 
@Controller public class HomeСontroller{ 
 
    @RequestMapping("/")     
    @ResponseBody     
    String home() {         
        return "<h1>Hello, Spring Boot!</h1>";     
    }
} 