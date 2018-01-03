package com.example.task5.MironovaJulija_Task5_Java.domain;

import javax.persistence.*;
import org.hibernate.validator.constraints.Email;
import java.util.Set;

@Entity
@Table(name = "Student")
public class Student{
    @Id
    @GeneratedValue(strategy=GenerationType.IDENTITY)
    private long id;
    private String firstname;
    private String lastname;
    private String group_name;
    @Email
    @Column(nullable=false) 
    private String email;
    
    @ManyToMany(mappedBy = "students")
    private Set<Course> courses;
   
    public Student() {
    }

    public Student(long id, String firstname, String lastname, String group_name, String email) {
        this.id = id;
        this.firstname = firstname;
        this.lastname = lastname;
        this.group_name = group_name;
        this.email = email;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getFirstname() {
        return firstname;
    }

    public void setFirstname(String firstname) {
        this.firstname = firstname;
    }
   
    public String getLastname() {
        return lastname;
    }

    public void setLastname(String lastname) {
        this.lastname = lastname;
    }

    public String getGroup() {
        return group_name;
    }

    public void setGroup(String group_name) {
        this.group_name = group_name;
    }
   
    public Set<Course> getCourses() {
       return courses;
   }
   
   public void setCourses(Set<Course> courses) {
       this.courses = courses;
   }
}