-- ==========================================
-- BBest.lk Database Schema
-- Target Database: bbest_db
-- ==========================================

CREATE DATABASE IF NOT EXISTS `bbest_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `bbest_db`;

-- 1. Users Table
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `google_id` VARCHAR(255) NULL UNIQUE,
    `name` VARCHAR(255) NULL,
    `email` VARCHAR(255) NULL UNIQUE,
    `phone` VARCHAR(50) NULL UNIQUE,
    `email_or_phone` VARCHAR(255) UNIQUE NOT NULL,
    `password_hash` VARCHAR(255) NULL,
    `user_type` ENUM('owner', 'agent', 'company') NOT NULL DEFAULT 'owner',
    `profile_image` VARCHAR(255) NULL,
    `auth_provider` VARCHAR(50) DEFAULT 'local',
    `is_verified` TINYINT(1) DEFAULT 0,
    `email_verified_at` DATETIME NULL,
    `phone_verified_at` DATETIME NULL,
    `last_login_at` DATETIME NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_email_phone` (`email`, `phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. User Profiles Table
CREATE TABLE IF NOT EXISTS `user_profiles` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `display_name` VARCHAR(255) NULL,
    `cover_image` VARCHAR(255) NULL,
    `bio` TEXT NULL,
    `address` VARCHAR(255) NULL,
    `rating` DECIMAL(2,1) DEFAULT 0.0,
    `followers_count` INT DEFAULT 0,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Companies Table
CREATE TABLE IF NOT EXISTS `companies` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `company_name` VARCHAR(255) NOT NULL,
    `registration_no` VARCHAR(100) NULL,
    `business_reg_no` VARCHAR(100) NULL,
    `vat_no` VARCHAR(100) NULL,
    `incorporation_year` INT NULL,
    `branches_count` INT DEFAULT 1,
    `team_size` INT DEFAULT 1,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Categories Table
CREATE TABLE IF NOT EXISTS `categories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `listing_group` VARCHAR(50) NOT NULL, -- 'property', 'vehicle', 'property_service', 'vehicle_service'
    `icon` VARCHAR(255) NULL,
    INDEX `idx_listing_group` (`listing_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Sub-categories Table
CREATE TABLE IF NOT EXISTS `sub_categories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `category_id` INT NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Locations Table
CREATE TABLE IF NOT EXISTS `locations` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `district` VARCHAR(100) NOT NULL,
    `city` VARCHAR(100) NOT NULL,
    INDEX `idx_loc` (`district`, `city`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Ads Table (Property, Vehicle, and Services Listings)
CREATE TABLE IF NOT EXISTS `ads` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `category_id` INT NOT NULL,
    `sub_category_id` INT NULL,
    `location_id` INT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `price` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `currency` VARCHAR(10) DEFAULT 'LKR',
    `listing_group` VARCHAR(50) NOT NULL, -- 'property', 'vehicle', 'property_service', 'vehicle_service'
    `purpose` VARCHAR(50) NULL, -- 'For Sale', 'For Rent', etc.
    `status` VARCHAR(50) DEFAULT 'pending', -- 'pending', 'approved', 'rejected'
    
    -- Property Specific Fields
    `perch` DECIMAL(10,2) NULL,
    `beds` INT NULL,
    `baths` INT NULL,
    `sqft` INT NULL,
    
    -- Vehicle Specific Fields
    `brand` VARCHAR(100) NULL,
    `model` VARCHAR(100) NULL,
    `model_year` INT NULL,
    `mileage` INT NULL,
    `fuel_type` VARCHAR(50) NULL,
    `transmission` VARCHAR(50) NULL,
    `engine_capacity` INT NULL,
    `condition` VARCHAR(50) NULL, -- 'New', 'Used', 'Reconditioned'
    
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`),
    FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`location_id`) REFERENCES `locations`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Listing Media Table
CREATE TABLE IF NOT EXISTS `listing_media` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `ad_id` INT NOT NULL,
    `media_type` VARCHAR(50) NOT NULL, -- 'image', 'video', '360'
    `media_url` VARCHAR(255) NOT NULL,
    `is_main` TINYINT(1) DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`ad_id`) REFERENCES `ads`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Wanted Ads Table
CREATE TABLE IF NOT EXISTS `wanted_ads` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `listing_group` VARCHAR(50) NOT NULL, -- 'property', 'vehicle'
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. Social Interactions Table (Likes, Comments, Shares)
CREATE TABLE IF NOT EXISTS `social_interactions` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `ad_id` INT NOT NULL,
    `interaction_type` VARCHAR(50) NOT NULL, -- 'like', 'comment', 'share'
    `comment_text` TEXT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`ad_id`) REFERENCES `ads`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 11. Loan Applications Table
CREATE TABLE IF NOT EXISTS `loan_applications` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `ad_id` INT NULL,
    `bank_name` VARCHAR(100) NOT NULL,
    `branch_name` VARCHAR(100) NOT NULL,
    `loan_amount` DECIMAL(15,2) NOT NULL,
    `down_payment` DECIMAL(15,2) NOT NULL,
    `term_years` INT NOT NULL,
    `monthly_payment` DECIMAL(15,2) NOT NULL,
    `full_name` VARCHAR(255) NOT NULL,
    `birthdate` VARCHAR(100) NULL,
    `address` VARCHAR(255) NULL,
    `phone` VARCHAR(50) NOT NULL,
    `email` VARCHAR(255) NULL,
    `employment_details` VARCHAR(255) NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`ad_id`) REFERENCES `ads`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ==========================================
-- Seeding Default Metadata & Demo Data
-- ==========================================

-- Seed Categories: Property
INSERT INTO `categories` (`name`, `listing_group`, `icon`) VALUES
('House', 'property', 'img/icons/house.svg'),
('Land', 'property', 'img/icons/land.svg'),
('Apartment', 'property', 'img/icons/apartment.svg'),
('Commercial', 'property', 'img/icons/commercial.svg'),
('Annex', 'property', 'img/icons/annex.svg'),
('Villa', 'property', 'img/icons/villa.svg'),
('Office', 'property', 'img/icons/office.svg'),
('Shop', 'property', 'img/icons/shop.svg'),
('Warehouse', 'property', 'img/icons/warehouse.svg'),
('Factory', 'property', 'img/icons/factory.svg'),
('Hotel / Guest House', 'property', 'img/icons/hotel.svg'),
('Resort', 'property', 'img/icons/resort.svg'),
('Agricultural Land', 'property', 'img/icons/agricultural.svg'),
('Other', 'property', 'img/icons/other_lands.svg');

-- Seed Categories: Vehicle
INSERT INTO `categories` (`name`, `listing_group`, `icon`) VALUES
('Car', 'vehicle', 'img/icons/car.png'),
('SUVs / Jeeps', 'vehicle', 'img/icons/suv.png'),
('Vans', 'vehicle', 'img/icons/van.png'),
('Motorcycles', 'vehicle', 'img/icons/motorbike.png'),
('Three Wheelers', 'vehicle', 'img/icons/three-wheel.png'),
('Buses', 'vehicle', 'img/icons/bus.png'),
('Trucks & Lorries', 'vehicle', 'img/icons/truck.png'),
('Heavy Equipment', 'vehicle', 'img/icons/heavy.png'),
('Tractors', 'vehicle', 'img/icons/tractor.png'),
('Other', 'vehicle', 'img/icons/other_vehicles.png');

-- Seed Categories: Property Services
INSERT INTO `categories` (`name`, `listing_group`, `icon`) VALUES
('Construction Services', 'property_service', NULL),
('Architecture & Design', 'property_service', NULL),
('Survey & Land Services', 'property_service', NULL),
('Legal & Documentation', 'property_service', NULL),
('Property Valuation & Inspection', 'property_service', NULL),
('Property Sales & Marketing', 'property_service', NULL),
('Construction Materials', 'property_service', NULL),
('Installations', 'property_service', NULL),
('Interior & Finishing', 'property_service', NULL),
('Property Maintenance', 'property_service', NULL),
('Cleaning Services', 'property_service', NULL),
('Security Services', 'property_service', NULL),
('Moving & Relocation', 'property_service', NULL);

-- Seed Categories: Vehicle Services
INSERT INTO `categories` (`name`, `listing_group`, `icon`) VALUES
('Maintenance', 'vehicle_service', NULL),
('Repair', 'vehicle_service', NULL),
('Electrical', 'vehicle_service', NULL),
('Air Condition', 'vehicle_service', NULL),
('Tires', 'vehicle_service', NULL),
('Body & Paint', 'vehicle_service', NULL),
('Glass', 'vehicle_service', NULL),
('Modification', 'vehicle_service', NULL),
('Transport', 'vehicle_service', NULL),
('Inspection', 'vehicle_service', NULL),
('Driving Training', 'vehicle_service', NULL),
('Technology', 'vehicle_service', NULL),
('Battery', 'vehicle_service', NULL),
('Valuation', 'vehicle_service', NULL),
('Cleaning', 'vehicle_service', NULL);

-- Seed Locations: Districts & Cities (Sample dataset matching frontend JS structures)
INSERT INTO `locations` (`district`, `city`) VALUES
('Colombo', 'Colombo 1-15'),
('Colombo', 'Battaramulla'),
('Colombo', 'Wellawatte'),
('Colombo', 'Dehiwala'),
('Colombo', 'Mount Lavinia'),
('Colombo', 'Ratmalana'),
('Colombo', 'Kolonnawa'),
('Colombo', 'Angoda'),
('Colombo', 'Mulleriyawa'),
('Colombo', 'Malabe'),
('Colombo', 'Homagama'),
('Colombo', 'Kaduwela'),
('Colombo', 'Athurugiriya'),
('Colombo', 'Pannipitiya'),
('Colombo', 'Kahathuduwa'),
('Colombo', 'Moratuwa'),
('Colombo', 'Piliyandala'),
('Gampaha', 'Gampaha'),
('Gampaha', 'Negombo'),
('Gampaha', 'Katunayake'),
('Gampaha', 'Wattala'),
('Gampaha', 'Ja-Ela'),
('Gampaha', 'Ragama'),
('Gampaha', 'Kelaniya'),
('Gampaha', 'Kiribathgoda'),
('Gampaha', 'Kadawatha'),
('Kalutara', 'Kalutara'),
('Kalutara', 'Panadura'),
('Kalutara', 'Wadduwa'),
('Kalutara', 'Horana'),
('Kandy', 'Kandy'),
('Kandy', 'Peradeniya'),
('Kandy', 'Katugastota'),
('Matale', 'Matale'),
('Matale', 'Dambulla'),
('Nuwara Eliya', 'Nuwara Eliya'),
('Galle', 'Galle'),
('Galle', 'Hikkaduwa'),
('Matara', 'Matara'),
('Matara', 'Weligama'),
('Hambantota', 'Hambantota'),
('Hambantota', 'Tangalle');

-- Seed a Demo User (Password is 'password123')
INSERT INTO `users` (`name`, `email`, `phone`, `email_or_phone`, `password_hash`, `user_type`, `is_verified`) VALUES
('John Doe', 'john@example.com', '0770000000', 'john@example.com', '$2y$10$tZ2cQpI8K0eZ358w9a9oGe3qCjGvqHn.W6e6T4X3Kqf9C8J7B1d0G', 'owner', 1);

INSERT INTO `user_profiles` (`user_id`, `display_name`, `bio`, `address`, `rating`, `followers_count`) VALUES
(1, 'John Doe', 'Real estate enthusiast and owner listing active properties.', 'Moratuwa, Sri Lanka', 4.5, 12);

-- Seed a Demo Ad
INSERT INTO `ads` (`user_id`, `category_id`, `location_id`, `title`, `description`, `price`, `currency`, `listing_group`, `purpose`, `status`, `perch`, `beds`, `baths`, `sqft`) VALUES
(1, 1, 16, 'Beautiful 2 Story House in Moratuwa', 'A spacious house located in a quiet neighborhood in Lakshapathiya, Moratuwa. Close to supermarkets and schools.', 100000000.00, 'LKR', 'property', 'For Sale', 'approved', 10.95, 3, 2, 1830);

-- Seed Media for the Demo Ad
INSERT INTO `listing_media` (`ad_id`, `media_type`, `media_url`, `is_main`) VALUES
(1, 'image', 'img/main_image.webp', 1);
