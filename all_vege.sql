-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2016 at 08:57 AM
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
(3, 'Comment', 1, 23, '2016-08-22 04:19:02'),
(10, 'Comment', 1, 17, '2016-08-24 23:23:18');

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
(17, 'Black Bean Quesadillas', 'In a hurry? These satisfying quesadillas take just 15 minutes to make. We like them with black beans, but pinto beans work well too. If you like a little heat, be sure to use pepper Jack cheese in the filling. Serve with: A little sour cream and a mixed green salad.', '<ul> \r\n<li>1 15-ounce can black beans, rinsed</li>\r\n<li>1/2 cup shredded Monterey Jack cheese, preferably pepper Jack</li> \r\n<li>1/2 cup prepared fresh salsa (see Tip), divided</li>\r\n<li>4 8-inch whole-wheat tortillas</li>\r\n<li>2 teaspoons canola oil, divided</li> \r\n<li>1 ripe avocado, diced</li>\r\n</ul>', '<ol> \r\n<li>Combine beans, cheese and 1/4 cup salsa in a medium bowl. Place tortillas on a work surface. Spread 1/2 cup filling on half of each tortilla. Fold tortillas in half, pressing gently to flatten.</li> \r\n<br> \r\n<li>Heat 1 teaspoon oil in a large nonstick skillet over medium heat. Add 2 quesadillas and cook, turning once, until golden on both sides, 2 to 4 minutes total. Transfer to a cutting board and tent with foil to keep warm. Repeat with the remaining 1 teaspoon oil and quesadillas. Serve the quesadillas with avocado and the remaining salsa.</li>\r\n</ol> \r\n<i>Tip: Look for prepared fresh salsa in the supermarket refrigerator section near other dips and spreads.</i>', '3', 'dinner', '57ba7c8f299e1.jpg', '2016-08-21 11:15:13', 1),
(23, 'Spinach Gnocchi', 'Here we add a little cooked spinach to traditional potato gnocchi for a zip of color. They''re delicious tossed with a pesto or your favourite marinara sauce.', '<ul> \r\n<li>2 pounds medium Yukon Gold or russet potatoes</li> \r\n<li>3/4 teaspoon salt</li> \r\n<li>1 large egg yolk, beaten</li> \r\n<li>5 ounces frozen thawed (or chopped fresh) spinach</li>  \r\n<li>1-1 1/4 cups all-purpose flour, divided</li> \r\n</ul>', '<ol> \r\n<li>Preheat oven to 200 Â°C.</li> \r\n<br>\r\n<li>Pierce potatoes in several spots with a fork. Bake directly on the center rack until tender when pierced with a knife, 45 minutes to 1 1/4 hours, depending on the size and type of your potatoes. Remove to a wire rack and let stand until cool enough to handle, 15 to 20 minutes.</li> \r\n<br>\r\n<li>Scoop the insides out of the potato skins and push through a potato ricer fitted with a fine disc onto a clean counter. (If you don''t have a ricer, mash the potatoes until smooth.) Gather the potato into a mound on the counter, sprinkle with salt and let cool, about 15 minutes.</li> \r\n<br>\r\n<li>Put a large pot of water on to boil.</li> \r\n<br>\r\n<li>Place the egg yolk in a food processor. Boil spinach until tender, 2 to 3 minutes. Drain and squeeze out liquid; transfer to the food processor with the yolk; pulse until pureed.</li> \r\n<br>\r\n<li>Pour the spinach puree over the cooled potato and then sprinkle 1 cup flour on top. Use a bench knife or metal spatula to gently fold the flour and spinach puree into the potatoes until combined (it will not look like dough at this point). Gently squeeze, knead and pat the dough until it holds together and resembles biscuit dough or cookie dough. The dough will be a little sticky; if it''s very sticky, add more flour, about 1 tablespoon at a time, as necessary. Be careful not to overwork the dough: overworked dough will yield tougher gnocchi.</li> \r\n<br>\r\n<li>Pat the dough into a 1 1/2-inch-thick disk and then divide it into 4 equal pieces. Working on a lightly floured surface with lightly floured hands, roll each portion into a 24- to 26-inch-long "snake," 1/2 to 3/4 inch wide. Start at the center of the dough and roll out using your fingertips and very light pressure; gently pull the dough out as you roll. Cut the snake into 3/4-inch pieces. Use your fingertip to make an indentation (or "dimple") in the center of each gnocchi. Place the gnocchi on a lightly floured baking sheet as they are made. Repeat with remaining dough.</li> \r\n<br>\r\n<li>Adjust the heat so the water is at a gentle boil. Add about one-quarter of the gnocchi at a time. When the gnocchi float to the top, transfer to a parchment or wax paper-lined baking sheet with a slotted spoon. Continue boiling the gnocchi in batches until they are all cooked, returning the water to a gentle boil between batches. Serve immediately or see Sauteed Gnocchi (see Tip).</li> \r\n<br> \r\n</ol> \r\n<br> \r\n<i>Make Ahead Tip: Toss cooked gnocchi with olive oil and refrigerate in a single layer for up to 2 days. (Or freeze cooked gnocchi in a single layer on a lined baking sheet, transfer to an airtight container and freeze for up to 3 months. Defrost in the refrigerator.) Reheat</i> \r\n<br><br> \r\n<i>Tip: To get a golden-brown crust on the outside of the gnocchi, cook about one-quarter of a batch of the gnocchi at a time in 1 teaspoon extra-virgin olive oil in a large nonstick skillet over medium-high heat, stirring gently, about 2 minutes.</i>', '4', 'dinner', '57ba7cf572bd0.jpg', '2016-08-21 11:26:12', 1),
(25, 'Toast', 'Yummy toast. good for eating', '<ul> \r\n<li>Bread</li> \r\n</ul>', '<ol> \r\n<li>Toast it</li> \r\n</ol> \r\n<br> \r\n<i>Tip: Use toaster</i>', '1', 'breakfast', '57ba7e6b0cd46.jpg', '2016-08-22 01:00:14', 1),
(32, 'Coconut and Date Smoothie', 'This delicious smoothie is great for an on the go breakfast or even if you''re just craving something sweet.', '<ul> \r\n<li>1 C Almond milk</li> \r\n<li>1 C Coconut water</li>\r\n<li>1/3 C shredded coconut</li>\r\n<li>2 C Dates</li>\r\n</ul>', '<ol> \r\n<li>Add all ingredients into a blender and blend on high for 2 minutes</li>\r\n<br> \r\n<i>Feel free to add more ingredients to suite your taste on this recipe.</i>\r\n</ol>', '3', 'beverage', '57bd0337ece37.jpg', '2016-08-24 02:15:20', 1),
(33, 'Chocolate Mousse', 'Quick and easy recipe that contains no eggs or gelatine, suitable for any occasion. Great served with fruit.', '<ul>\r\n<li>100g bar good quality plain chocolate</li>\r\n<li>50ml milk</li> \r\n<li>200ml double cream</li>\r\n<li>100g strawberries (or other seasonal fruit) sliced.</li>\r\n</ul>', '<ol> \r\n<li>Melt the chocolate in a bowl over a pan of simmering water.</li> \r\n<br>\r\n<li>Heat the milk until boiling, then whisk in melted chocolate. Leave to cool.</li> \r\n<br>\r\n<li>Whip 150ml of cream until soft peak stage, then fold into cooled chocolate.</li> \r\n<br>\r\n<li>Reserve 6 strawberries for decoration, place remainder into 6 serving ramekins or small bowls.</li> \r\n<br>\r\n<li>Evenly spoon in the chocolate mixture.</li> \r\n<br>\r\n<li>Whip remaining cream and use to decorate the the top of the desert with the sliced strawberries.</li> \r\n<br> \r\n</ol>', '4', 'dessert', '57be72afcd554.jpg', '2016-08-25 04:23:12', 3),
(34, 'Chocolate banana ice cream', 'A low-fat chocolate ice cream? It really does exist! Our blitzed banana creation is gluten and dairy-free and ready in minutes', '<ul> \r\n<li>1 frozen banana</li>\r\n<li>1 tsp cocoa powder</li> \r\n</ul>', '<ol> \r\n<li>In a blender, blitz the frozen banana with the cocoa powder until smooth. Eat straight away.</li> \r\n</ol>', '1', 'dessert', '57be73f667dc3.jpg', '2016-08-25 04:28:38', 1),
(35, 'Raw Kale and Brussels Sprouts Salad with Tahini-Maple Dressing', 'A simple, filling kale salad with creamy tahini dressing. Thinly sliced brussels sprouts and toasted slivered almonds lend slaw-like crunch, while parmesan and miso contribute savoriness. This salad is easily made vegan; just omit the parmesan cheese.', '<ul> \r\n<li>1 bunch of curly green kale</li>\r\n<li>12 brussels sprouts (about 2 big handfuls'' worth)</li>\r\n<li>3 tablespoons sliced almonds</li>\r\n<li>Â¼ cup shaved Parmesan (use a vegetable peeler to shave the cheese into little strips)</li>\r\n<li>dash of sea salt</li>\r\n</ul> \r\n<i>Tahini-maple dressing</i>\r\n<ul> \r\n<li>Â¼ cup tahini</li>\r\n<li>2 tablespoons white wine vinegar</li>\r\n<li>2 teaspoons white miso</li>\r\n<li>2 teaspoons maple syrup</li>\r\n<li>Pinch of red pepper flakes</li>\r\n<li>Â¼ cup water</li>\r\n</ul>', '<ol> \r\n<li>Use a chef''s knife to cut out the ribs of the kale leaves. Chop the kale into small, bite-sized pieces. Sprinkle a dash of sea salt over the kale and use your hands to massage the kale by lightly scrunching handfuls of kale in your hands. Release and repeat until the kale becomes darker in color and more fragrant. Transfer the kale to a medium serving bowl.</li> \r\n<br> \r\n<li>Chop off and discard the stem end of the brussels sprouts and any discolored outer leaves. Either use your knife to slice the sprouts as thin as possible, or shred the sprouts in your food processor using the slicing disk. Add the sprouts to the bowl and use your fingers break up any clumps.</li> \r\n<br> \r\n<li>In a small mixing bowl, whisk together the tahini, vinegar, miso, maple syrup and red pepper flakes. Whisk in the water until the mixture is smooth and creamy. Some brands of tahini are thicker than others, so if your dressing is too thick, add a bit more water and/or vinegar, to taste. Pour the dressing over the kale and sprouts and mix well.</li> \r\n<br> \r\n<li>In a small pan over medium heat, toast the almond slivers, stirring frequently, until fragrant and turning golden (this will take less than five minutes so watch carefully). Add the toasted almonds and parmesan shavings to the salad and toss. Serve immediately.</li> \r\n<br> \r\n</ol> \r\n<i>Notes:</li> \r\n<br> \r\n<p>STORAGE SUGGESTIONS: Refrigerated leftover salad should be good for a couple of days. You might want to wake up the flavours with a tiny splash of vinegar before serving.</p> \r\n<p>MAKE IT VEGAN: Simply omit the Parmesan cheese.</p>', '2', 'lunch', '57be7659d9d09.jpg', '2016-08-25 04:38:50', 1),
(36, 'Vegan Chocolate Chip Cookies', 'It will be hard to keep your cookie jar full if you fill it with these delicious vegan chocolate chip cookies!', '<ul> \r\n<li>2/3 cup refined coconut oil, melted</li>\r\n<li>2/3 cup vegan granulated sugar</li>\r\n<li>2/3 cup packed vegan brown sugar</li>\r\n<li>1/2 cup unsweetened vanilla almond milk</li>\r\n<li>2 teaspoons vanilla</li>\r\n<li>2 1/2 cups all-purpose flour</li>\r\n<li>1 teaspoon baking soda</li>\r\n<li>1 teaspoon baking powder</li>\r\n<li>1/2 teaspoon salt</li>\r\n<li>1 bag (10 oz) vegan semisweet chocolate chips (1 1/2 cups)</li>\r\n</ul>', '<ol> \r\n<li>Heat oven to 350Â°F. In large bowl, mix coconut oil, granulated sugar and brown sugar until well mixed. Stir in almond milk and vanilla.</li> \r\n<br>\r\n<li>Stir in flour, baking soda, baking powder and salt until dough forms. Stir in chocolate chips. Drop dough by slightly rounded tablespoonfuls 2 inches apart onto ungreased cookie sheets.</li> \r\n<br>\r\n<li> Bake 11 to 14 minutes or until edges are light brown and tops look set. Cool 1 minute on cookie sheets. Remove to cooling rack; cool completely. Store in tightly covered container.</li> \r\n</ol>', '4', 'baked', '57be780cdff6d.jpg', '2016-08-25 04:46:04', 1),
(37, 'Balsamic and Rocket Salad', 'This quick and easy salad is great to have as an entrÃ©e or as a delicious and healthy snack.', '<ul> \r\n<li>2 handfuls of rocket leaves</li> \r\n<li>1tsp Balsamic Vinegar</li> \r\n<li>Tasty cheese</li> \r\n</ul>', '<ol> \r\n<li>Wash the rocket leaves in water</li> \r\n<br>\r\n<li>Put leaves in a bowl. sprinkle over the cheese and add dressing</li> \r\n<br>\r\n</ol>', '1', 'side', '57be79e571a75.jpg', '2016-08-25 04:53:57', 1),
(38, 'Carrot, Apple & Lemon juice', 'This delicious juice is great when you''re craving something sweet and refreshing in the summer or a tasty way to get part of your daily vegetables in any other time of the year.', '<ul> \r\n<li>4 Carrots</li> \r\n<li>2 Apples</li>\r\n<li>1 small lemon</li>\r\n</ul>', '<ol> \r\n<li>Chop the ends off the carrots and into pieces that are an appropriate size for your juicer.</li>\r\n<br>\r\n<li>Chop your apple into pieces that are an appropriate size for your juicer</li>\r\n<br>\r\n<li>Remove the skin form the lemon</li>\r\n<br>\r\n<li>Juice everything tother and enjoy</li>\r\n</ol>', '2', 'beverage', '57be7bbd272de.jpg', '2016-08-25 05:01:49', 3);

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
(1, 'Admin', 'Account', 'admin@test.com', '', '$2y$10$2M5EVLqOmDBSXzVn10v6BuwWihRteX.CJmGKI9mCOl/LskhZK/mSS', 'admin'),
(3, 'Moderator ', 'Account', 'mod@test.com', '', '$2y$10$jzB/tSTf7crB4ffL3MBAV.AMtdb9cy.zAaGb3aMzWxmzC7lO5EBtq', 'moderator'),
(25, 'User', 'Account', 'user@test.com', '', '$2y$10$dy/lTzYhZOkd9puwfnFsbeU.F/ckyh63x8e0nOsPdKDiaTpzHYS1u', 'user');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
