-- AuraDent Dental Clinic & Implant Center
-- Database Schema for MySQL 8+ / MariaDB
-- Character set: utf8mb4

CREATE DATABASE IF NOT EXISTS `auradent_clinic` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `auradent_clinic`;

-- 1. Admins Table
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password_hash` VARCHAR(255) NOT NULL,
    `full_name` VARCHAR(100) NOT NULL,
    `role` VARCHAR(20) DEFAULT 'admin',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Doctors Table
DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `qualifications` VARCHAR(100) NOT NULL,
    `specialty` VARCHAR(100) NOT NULL,
    `experience_years` INT DEFAULT 10,
    `bio` TEXT NOT NULL,
    `schedule_days` VARCHAR(100) DEFAULT 'Mon, Tue, Wed, Thu, Fri',
    `hours_text` VARCHAR(100) DEFAULT '8:30 AM - 5:00 PM',
    `avatar_url` VARCHAR(255) DEFAULT 'assets/images/doctor-sarah.jpg',
    `is_active` TINYINT(1) DEFAULT 1,
    `display_order` INT DEFAULT 1,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Services Table
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `slug` VARCHAR(100) NOT NULL UNIQUE,
    `name` VARCHAR(150) NOT NULL,
    `category` VARCHAR(80) NOT NULL,
    `short_description` TEXT NOT NULL,
    `full_description` TEXT NOT NULL,
    `price_starting` DECIMAL(10, 2) NOT NULL,
    `duration_mins` INT DEFAULT 60,
    `icon` VARCHAR(50) DEFAULT 'tooth',
    `is_featured` TINYINT(1) DEFAULT 1,
    `display_order` INT DEFAULT 1,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Bookings Table
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `booking_reference` VARCHAR(20) NOT NULL UNIQUE,
    `doctor_id` INT NULL,
    `service_id` INT NULL,
    `patient_name` VARCHAR(120) NOT NULL,
    `patient_email` VARCHAR(120) NOT NULL,
    `patient_phone` VARCHAR(50) NOT NULL,
    `patient_dob` DATE NULL,
    `appointment_date` DATE NOT NULL,
    `appointment_time` VARCHAR(20) NOT NULL,
    `is_new_patient` TINYINT(1) DEFAULT 1,
    `is_emergency` TINYINT(1) DEFAULT 0,
    `notes` TEXT NULL,
    `status` VARCHAR(20) DEFAULT 'pending',
    `admin_notes` TEXT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_date_doctor` (`appointment_date`, `doctor_id`),
    INDEX `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. Reviews Table
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `patient_name` VARCHAR(100) NOT NULL,
    `treatment` VARCHAR(100) NOT NULL,
    `rating` TINYINT NOT NULL CHECK(`rating` BETWEEN 1 AND 5),
    `comment` TEXT NOT NULL,
    `is_verified` TINYINT(1) DEFAULT 1,
    `is_approved` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 6. Inquiries Table
DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE `inquiries` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(120) NOT NULL,
    `phone` VARCHAR(50) NULL,
    `subject` VARCHAR(150) NOT NULL,
    `message` TEXT NOT NULL,
    `status` VARCHAR(20) DEFAULT 'unread',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Initial Seed Admin (admin / admin123)
INSERT INTO `admins` (`username`, `password_hash`, `full_name`, `role`) VALUES
('admin', '$2y$10$oX19VpQzC4l8b5B2LzK0Ce.VnU62Fh1/04wNfU8r2Vz5iI2dCqXeq', 'Dr. Sarah Jensen', 'superadmin');
