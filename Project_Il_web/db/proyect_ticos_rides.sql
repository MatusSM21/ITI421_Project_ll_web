
--
-- Estructura de tabla para la tabla `rides`
--

CREATE TABLE `rides` (
  `id` int(11) NOT NULL,
  `ride_name` varchar(255) NOT NULL,
  `start_from` varchar(255) NOT NULL,
  `end_to` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `days` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rides`
--

INSERT INTO `rides` (`id`, `ride_name`, `start_from`, `end_to`, `description`, `departure_time`, `arrival_time`, `days`, `user_id`) VALUES
(8, 'Ride Matus', 'Ciudad Quesada', 'Santa Rosa', 'Viaje super divertido, pura vida!!', '08:23:00', '12:17:00', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `phone`, `username`, `password`, `confirm_password`) VALUES
(5, 'Cristopher', 'Matus Salas', '86074258', 'Matus', '$2y$10$PqeOUmFNFgEgW1K6.55xQ.7i8/SocWKQEvjRJGW3mOuHtEFkMbxnC', 'Salas3107');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `average_speed` varchar(50) NOT NULL,
  `about_me` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user_data`
--

INSERT INTO `user_data` (`id`, `full_name`, `average_speed`, `about_me`, `user_id`) VALUES
(2, 'Cristopher Matus Salas', '100k/h', 'Serio, paciente y muy pura vida.', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rides`
--
ALTER TABLE `rides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

