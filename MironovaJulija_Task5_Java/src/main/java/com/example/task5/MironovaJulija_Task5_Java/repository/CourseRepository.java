package com.example.task5.MironovaJulija_Task5_Java.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import com.example.task5.MironovaJulija_Task5_Java.domain.*;

public interface CourseRepository extends JpaRepository<Course, Long>{
    Course findById(Long id);
}
