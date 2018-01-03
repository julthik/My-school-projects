package com.example.task5.MironovaJulija_Task5_Java.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import com.example.task5.MironovaJulija_Task5_Java.domain.*;
import java.util.List;

public interface StudentRepository extends JpaRepository<Student, Long>{

    @Query(value="SELECT Student.* FROM Student, Courses_Students, Course WHERE Student.id=Courses_Students.student_id"+
    " AND Courses_Students.course_id = Course.id AND Course.id=?1", nativeQuery = true)
    List<Student> findStudentsByCourseId(long id);
   }