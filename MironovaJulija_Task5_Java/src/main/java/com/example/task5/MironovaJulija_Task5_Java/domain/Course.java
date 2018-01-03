package com.example.task5.MironovaJulija_Task5_Java.domain;

import javax.persistence.*;
import java.util.Set;

@Entity
@Table(name = "Course")
public class Course{
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    private String title;
    private String description;
    @Column(unique=true)
    private String code;

    @JoinTable(
        name = "Courses_Students",
        joinColumns = @JoinColumn(name = "course_id", referencedColumnName = "id"),
        inverseJoinColumns = @JoinColumn(name = "student_id", referencedColumnName = "id")
    )
    @ManyToMany(cascade=CascadeType.ALL)
    private Set<Student> students;

    public Course() {
    }

    public Course(Long id, String title, String description, String code) {
        this.id=id;
        this.title=title;
        this.description=description;
        this.code=code;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getCode() {
        return code;
    }

    public void setCode(String code) {
        this.code = code;
    }

    public Set<Student> getStudent() {
        return students;
    }
    
    public void setStudent(Set<Student> students) {
        this.students = students;
    }

}