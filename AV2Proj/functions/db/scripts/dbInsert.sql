--PostgreSQL
--16.4

-- Random Insertions

-- Insert data into "users" table
INSERT INTO "public"."users" ("name", "email", "password", "cpf")
VALUES ('John Doe', 'john.doe@example.com', 'password123', '12345678901'),
        ('Guilherme de Almeida Martins', 'guilam.dev@gmail.com', 'password123', '12345678901'); 

-- Insert data into "rooms" table
INSERT INTO "public"."rooms" ("name", "price", "number", "number_of_beds", "description")
VALUES ('Standard Room', 100.00, 101, 2, 'A cozy room with a view');

-- Insert data into "reservations" table
INSERT INTO "public"."reservations" ("room_id", "user_id", "check_in", "check_out")
VALUES (1, 1, '2022-01-01', '2022-01-05');