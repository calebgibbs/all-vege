-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2016 at 11:20 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `all_vege`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `recipe_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `created_by`, `recipe_id`, `created_at`) VALUES
(2, 'This is my favourite recipe ever. I eat toast all the time and this recipe was so easy to follow.', 3, 25, '2016-08-22 01:05:02'),
(3, 'Comment', 1, 23, '2016-08-22 04:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ingredients` text NOT NULL,
  `method` text NOT NULL,
  `serves` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `category` enum('side','breakfast','lunch','dinner','dessert','baked','beverage') NOT NULL,
  `image` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `description`, `ingredients`, `method`, `serves`, `category`, `image`, `created_at`, `created_by`) VALUES
(17, 'Black Bean Quesadillas change', 'In a hurry? These satisfying quesadillas take just 15 minutes to make. We like them with black beans, but pinto beans work well too. If you like a little heat, be sure to use pepper Jack cheese in the filling. Serve with: A little sour cream and a mixed green salad.', '<ul> \r\n<li>1 15-ounce can black beans, rinsed</li>\r\n<li>1/2 cup shredded Monterey Jack cheese, preferably pepper Jack</li> \r\n<li>1/2 cup prepared fresh salsa (see Tip), divided</li>\r\n<li>4 8-inch whole-wheat tortillas</li>\r\n<li>2 teaspoons canola oil, divided</li> \r\n<li>1 ripe avocado, diced</li>\r\n</ul>', '<ol> \r\n<li>Combine beans, cheese and 1/4 cup salsa in a medium bowl. Place tortillas on a work surface. Spread 1/2 cup filling on half of each tortilla. Fold tortillas in half, pressing gently to flatten.</li> \r\n<br> \r\n<li>Heat 1 teaspoon oil in a large nonstick skillet over medium heat. Add 2 quesadillas and cook, turning once, until golden on both sides, 2 to 4 minutes total. Transfer to a cutting board and tent with foil to keep warm. Repeat with the remaining 1 teaspoon oil and quesadillas. Serve the quesadillas with avocado and the remaining salsa.</li>\r\n</ol> \r\n<i>Tip: Look for prepared fresh salsa in the supermarket refrigerator section near other dips and spreads.</i>', '4', 'dinner', '57ba7c8f299e1.jpg', '2016-08-21 11:15:13', 1),
(23, 'Spinach Gnocchi', 'Here we add a little cooked spinach to traditional potato gnocchi for a zip of color. They''re delicious tossed with a pesto or your favourite marinara sauce.', '<ul> \r\n<li>2 pounds medium Yukon Gold or russet potatoes</li> \r\n<li>3/4 teaspoon salt</li> \r\n<li>1 large egg yolk, beaten</li> \r\n<li>5 ounces frozen thawed (or chopped fresh) spinach</li>  \r\n<li>1-1 1/4 cups all-purpose flour, divided</li> \r\n</ul>', '<ol> \r\n<li>Preheat oven to 200 Â°C.</li> \r\n<br>\r\n<li>Pierce potatoes in several spots with a fork. Bake directly on the center rack until tender when pierced with a knife, 45 minutes to 1 1/4 hours, depending on the size and type of your potatoes. Remove to a wire rack and let stand until cool enough to handle, 15 to 20 minutes.</li> \r\n<br>\r\n<li>Scoop the insides out of the potato skins and push through a potato ricer fitted with a fine disc onto a clean counter. (If you don''t have a ricer, mash the potatoes until smooth.) Gather the potato into a mound on the counter, sprinkle with salt and let cool, about 15 minutes.</li> \r\n<br>\r\n<li>Put a large pot of water on to boil.</li> \r\n<br>\r\n<li>Place the egg yolk in a food processor. Boil spinach until tender, 2 to 3 minutes. Drain and squeeze out liquid; transfer to the food processor with the yolk; pulse until pureed.</li> \r\n<br>\r\n<li>Pour the spinach puree over the cooled potato and then sprinkle 1 cup flour on top. Use a bench knife or metal spatula to gently fold the flour and spinach puree into the potatoes until combined (it will not look like dough at this point). Gently squeeze, knead and pat the dough until it holds together and resembles biscuit dough or cookie dough. The dough will be a little sticky; if it''s very sticky, add more flour, about 1 tablespoon at a time, as necessary. Be careful not to overwork the dough: overworked dough will yield tougher gnocchi.</li> \r\n<br>\r\n<li>Pat the dough into a 1 1/2-inch-thick disk and then divide it into 4 equal pieces. Working on a lightly floured surface with lightly floured hands, roll each portion into a 24- to 26-inch-long "snake," 1/2 to 3/4 inch wide. Start at the center of the dough and roll out using your fingertips and very light pressure; gently pull the dough out as you roll. Cut the snake into 3/4-inch pieces. Use your fingertip to make an indentation (or "dimple") in the center of each gnocchi. Place the gnocchi on a lightly floured baking sheet as they are made. Repeat with remaining dough.</li> \r\n<br>\r\n<li>Adjust the heat so the water is at a gentle boil. Add about one-quarter of the gnocchi at a time. When the gnocchi float to the top, transfer to a parchment or wax paper-lined baking sheet with a slotted spoon. Continue boiling the gnocchi in batches until they are all cooked, returning the water to a gentle boil between batches. Serve immediately or see Sauteed Gnocchi (see Tip).</li> \r\n<br> \r\n</ol> \r\n<br> \r\n<i>Make Ahead Tip: Toss cooked gnocchi with olive oil and refrigerate in a single layer for up to 2 days. (Or freeze cooked gnocchi in a single layer on a lined baking sheet, transfer to an airtight container and freeze for up to 3 months. Defrost in the refrigerator.) Reheat</i> \r\n<br><br> \r\n<i>Tip: To get a golden-brown crust on the outside of the gnocchi, cook about one-quarter of a batch of the gnocchi at a time in 1 teaspoon extra-virgin olive oil in a large nonstick skillet over medium-high heat, stirring gently, about 2 minutes.</i>', '4', 'dinner', '57ba7cf572bd0.jpg', '2016-08-21 11:26:12', 1),
(25, 'Toast', 'Yummy toast. good for eating', '<ul> \r\n<li>Bread</li> \r\n</ul>', '<ol> \r\n<li>Toast it</li> \r\n</ol> \r\n<br> \r\n<i>Tip: Use toaster</i>', '1', 'breakfast', '57ba7e6b0cd46.jpg', '2016-08-22 01:00:14', 1),
(32, 'Coconut and Date Smoothie', 'This delicious smoothie is great for an on the go breakfast or even if you''re just craving something sweet.', '<ul> \r\n<li>1 C Almond milk</li> \r\n<li>1 C Coconut water</li>\r\n<li>1/3 C shredded coconut</li>\r\n<li>2 C Dates</li>\r\n</ul>', '<ol> \r\n<li>Add all ingredients into a blender and blend on high for 2 minutes</li>\r\n<br> \r\n<i>Feel free to add more ingredients to suite your taste on this recipe.</i>\r\n</ol>', '3', 'beverage', '57bd0337ece37.jpg', '2016-08-24 02:15:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_picture` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(60) NOT NULL,
  `privilege` enum('user','moderator','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `profile_picture`, `password`, `privilege`) VALUES
(1, 'Caleb', 'Gibbs', 'calebgibbs@me.com', '57b98b977fdd5.jpg', '$2y$10$Is.r4PAkoT14Y.gZZs0xROUM/hTBcnheq4Ru1g6aGMJyCaGuJ3AN2', 'admin'),
(2, 'User', 'Account', 'user@test.com', '', '$2y$10$/eMs0H3mvq6hXTUAzz/1Wu9AfRRJJZwbIKAq8LTPZE0U0QiLTpkoS', 'user'),
(3, 'Moderator ', 'Account', 'mod@test.com', '', '$2y$10$lwO.Gm1152cLfCBVeFFUQ.fB71g7Fx970HMWJwgUJ.OwIjI9KdEe6', 'moderator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
