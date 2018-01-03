package com.example.task5.MironovaJulija_Task5_Java.controller;

import com.example.task5.MironovaJulija_Task5_Java.repository.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller 
public class HomeСontroller{ 

    @Autowired
    private CourseService courseService;
    @Autowired
    private StudentService studentService;

    @RequestMapping(value = "/")
    public String getCourses(Model model) {
        model.addAttribute("courses", courseService.getAllCourses());
        return "index";
    }

    @RequestMapping(value = "/course/{id}")
    public String getCourseById(@PathVariable("id") short id, Model model) {
        model.addAttribute("course", courseService.getCourseByID(id));
        model.addAttribute("students", studentService.getStudentsByCourseID(id));
        return "course";
    }
} 