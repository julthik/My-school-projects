INSERT INTO Course(title, description, code) VALUES('Introduction to Networks','The course provides an integrated and comprehensive coverage of networking topics, from fundamentals to advanced applications and services, while providing opportunities for hands-on practical experience and career skills development','RRR0000');
INSERT INTO Course(title, description, code) VALUES('Routing and Switching Essentials','This course describes the architecture, components, and operations of routers and switches in a small network','RRR1111');
INSERT INTO Course(title, description, code) VALUES('Scaling Networks','This course describes the architecture, components, and operations of routers and switches in a larger and more complex network. Students learn how to configure routers and switches for advanced functionality','RRR2222');
INSERT INTO Course(title, description, code) VALUES('Estonian Language and Culture A1.1','Language learning is carried out mainly on English basis. Tuesdays 08.00-13.30 SOC-217','RRR4444');
INSERT INTO Course(title, description, code) VALUES('Preparatory Course for Communication in Russian B1 ','Language learning is carried out mainly on English basis. Fridays 10.00-11-30 SOC-217','RRR5555');

INSERT INTO Student (firstname, lastname, group_name, email) VALUES('Elena','Popova','RDIR51','elenaPopova@gmail.com');
INSERT INTO Student (firstname, lastname, group_name, email) VALUES('Anna','Smirnova','RDIR51','annaSmirnova@gmail.com');
INSERT INTO Student (firstname, lastname, group_name, email) VALUES('Andrei','Kuznetsov','RDIR51','andreiKuznetsov@gmail.com');
INSERT INTO Student (firstname, lastname, group_name, email) VALUES('Anton','Alekseev','RDIR51','antonAlekseev@gmail.com');
INSERT INTO Student (firstname, lastname, group_name, email) VALUES('Sergei','Ivanov','RDIR31','sergeiIvanov@gmail.com');
INSERT INTO Student (firstname, lastname, group_name, email) VALUES('Egor','Saar','RDIR31','egorSaar@gmail.com');

INSERT INTO Courses_Students(course_id, student_id) VALUES (1,3);
INSERT INTO Courses_Students(course_id, student_id) VALUES (2,3);
INSERT INTO Courses_Students(course_id, student_id) VALUES (3,3);
INSERT INTO Courses_Students(course_id, student_id) VALUES (4,5);
INSERT INTO Courses_Students(course_id, student_id) VALUES (5,5);
INSERT INTO Courses_Students(course_id, student_id) VALUES (4,6);
INSERT INTO Courses_Students(course_id, student_id) VALUES (5,6);
INSERT INTO Courses_Students(course_id, student_id) VALUES (1,1);
INSERT INTO Courses_Students(course_id, student_id) VALUES (1,2);
INSERT INTO Courses_Students(course_id, student_id) VALUES (2,4);
