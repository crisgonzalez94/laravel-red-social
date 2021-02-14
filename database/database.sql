CREATE DATABASE red_social;
USE red_social;

CREATE TABLE IF NOT EXISTS users(
    id INT(255) AUTO_INCREMENT NOT NULL,
    role VARCHAR(20),
    name VARCHAR(100),
    surname VARCHAR(200),
    nick VARCHAR(100),
    email VARCHAR(255),
    password VARCHAR(255),
    image VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME,
    remember_token VARCHAR(255),

    CONSTRAINT pk_users PRIMARY KEY (id)
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS images(
    id INT(255) AUTO_INCREMENT NOT NULL,
    user_id INT(255),
    image_path VARCHAR(255),
    description TEXT,
    created_at DATETIME,
    updated_at DATETIME,

    CONSTRAINT pk_images PRIMARY KEY (id),
    CONSTRAINT fk_images_users FOREIGN KEY (user_id) REFERENCES users(id)

)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS comments(
    id INT(255) AUTO_INCREMENT NOT NULL,
    user_id INT(255),
    image_id INT(255),
    content TEXT,
    created_at DATETIME,
    updated_at DATETIME,

    CONSTRAINT pk_comments PRIMARY KEY (id),
    CONSTRAINT fk_comments_users FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY (image_id) REFERENCES images(id)

)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS likes(
    id INT(255) AUTO_INCREMENT NOT NULL,
    user_id INT(255),
    image_id INT(255),
    created_at DATETIME,
    updated_at DATETIME,

    CONSTRAINT pk_users PRIMARY KEY (id),
    CONSTRAINT fk_likes_users FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_images FOREIGN KEY (image_id) REFERENCES images(id)

)Engine=InnoDb;


/*===============================================================================================
Users
==============================================================================================*/
INSERT INTO users VALUES(
    NULL, 
    'user' , 
    'Victor' , 
    'Robles' , 
    'victorroblesweb' , 
    'victor@victor.com' , 
    '12345678',
    null ,
    CURTIME() , 
    CURTIME()  ,
    NULL
);

INSERT INTO users VALUES(
    NULL, 
    'user' , 
    'Juan' , 
    'Lopez' , 
    'juanlopez' , 
    'juan@juan.com' , 
    '12345678',
    null ,
    CURTIME() , 
    CURTIME()  ,
    NULL
);

INSERT INTO users VALUES(
    NULL, 
    'user' , 
    'Manolo' , 
    'Garcia' , 
    'manologarcia' , 
    'manolo@manolo.com' , 
    '12345678',
    null ,
    CURTIME() , 
    CURTIME()  ,
    NULL
);

/*===============================================================================================
Images
==============================================================================================*/
INSERT INTO images VALUES(
    null,
    1,
    'test.jpg',
    'Descripcion de prueba 1',
    CURTIME(),
    CURTIME()
);
INSERT INTO images VALUES(
    null,
    1,
    'playa.jpg',
    'Descripcion de prueba 2',
    CURTIME(),
    CURTIME()
);
INSERT INTO images VALUES(
    null,
    1,
    'arena.jpg',
    'Descripcion de prueba 3',
    CURTIME(),
    CURTIME()
);
INSERT INTO images VALUES(
    null,
    3,
    'familia.jpg',
    'Descripcion de prueba 4',
    CURTIME(),
    CURTIME()
);



/*===============================================================================================
Comments
==============================================================================================*/
INSERT INTO comments VALUES(
    null,
    1,
    4,
    'Buena foto de familia',
    CURTIME(),
    CURTIME()
);
INSERT INTO comments VALUES(
    null,
    2,
    1,
    'Buena foto de playa',
    CURTIME(),
    CURTIME()
);
INSERT INTO comments VALUES(
    null,
    2,
    4,
    'Que bueno',
    CURTIME(),
    CURTIME()
);

/*===============================================================================================
Likes
==============================================================================================*/
INSERT INTO likes VALUES( NULL , 1, 4, CURTIME(), CURTIME() );
INSERT INTO likes VALUES( NULL , 2, 4, CURTIME(), CURTIME() );
INSERT INTO likes VALUES( NULL , 3, 1, CURTIME(), CURTIME() );
INSERT INTO likes VALUES( NULL , 3, 2, CURTIME(), CURTIME() );