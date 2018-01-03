package com.example.task5.MironovaJulija_Task5_Java.repository;

import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import com.example.task5.MironovaJulija_Task5_Java.domain.*;

@Service
public class CourseService{

    @Autowired
    CourseRepository courseRepository;

    public List<Course> getAllCourses(){
        return courseRepository.findAll();
    }
 
    public Course getCourseByID(long id){
        return courseRepository.findOne(id);
    }
}