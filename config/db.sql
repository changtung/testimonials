--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

  --
  -- AUTO_INCREMENT for table `users`
  --
  ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/* some user defined application specific */

create table businesses (
id int AUTO_INCREMENT,
name varchar(300),
description varchar(2000),
PRIMARY KEY (id)
);

create table testimonials (
id int AUTO_INCREMENT,
client_name varchar(300),
client_email varchar(300),
hash varchar(300),
rating int,
description varchar(1000),
business_id int,
PRIMARY KEY (id),
FOREIGN KEY business_key (business_id)
        REFERENCES businesses(id)
        ON DELETE CASCADE
);
