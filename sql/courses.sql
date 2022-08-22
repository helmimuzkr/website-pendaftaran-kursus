CREATE TABLE courses (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nama_kursus varchar(50) NOT NULL,
    description LONGTEXT, 
    start_course DATE,
    end_course DATE
)

INSERT INTO courses (nama_kursus)
    VALUES ('Junior Web Developer');
INSERT INTO courses (nama_kursus)
    VALUES ('Professional Web Developer');
INSERT INTO courses (nama_kursus)
    VALUES ('Node JS with Express JS');
INSERT INTO courses (nama_kursus)
    VALUES ('Javascript Intermediate');
INSERT INTO courses (nama_kursus)
    VALUES ('Laravel 9');
INSERT INTO courses (nama_kursus)
    VALUES ('PHP Native');
INSERT INTO courses (nama_kursus)
    VALUES ('Tailwind');

SELECT * FROM courses;