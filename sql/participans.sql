CREATE TABLE my_courses (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id INT,
    course_id INT,
    krs VARCHAR(255),
    confirm VARCHAR(15)
);

DESCRIBE my_courses;

ALTER TABLE my_courses
    ADD CONSTRAINT fk_my_courses_user
    FOREIGN KEY (user_id) REFERENCES users(id);

ALTER TABLE my_courses
    ADD CONSTRAINT fk_my_courses_course
    FOREIGN KEY (course_id) REFERENCES courses(id);

INSERT INTO my_courses (user_id, course_id, confirm)
    VALUES (1, 23, 'KONFIRMASI'), (1, 24, 'MENUNGGU');

SELECT users.nama, courses.nama_kursus, krs FROM my_courses
    INNER JOIN users ON (users.id = my_courses.user_id)
    INNER JOIN courses ON (courses.id = my_courses.course_id)
        WHERE user_id = 1; 

ALTER TABLE my_courses
    RENAME TO participans;

INSERT INTO participans (user_id, course_id, confirm)
    VALUES (1, 25, 'KONFIRMASI'), (1, 26, 'MENUNGGU');