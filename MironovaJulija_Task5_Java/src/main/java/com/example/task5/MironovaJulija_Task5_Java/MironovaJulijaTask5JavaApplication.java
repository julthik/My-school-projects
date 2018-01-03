package com.example.task5.MironovaJulija_Task5_Java;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;

@SpringBootApplication
@ComponentScan(basePackages = {"com.example.task5.MironovaJulija_Task5_Java.controller","com.example.task5.MironovaJulija_Task5_Java.domain","com.example.task5.MironovaJulija_Task5_Java.repository"})
public class MironovaJulijaTask5JavaApplication {
	public static void main(String[] args) {
		SpringApplication.run(MironovaJulijaTask5JavaApplication.class, args);
	}
}
