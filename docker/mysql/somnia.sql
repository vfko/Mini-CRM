-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 13. zář 2023, 11:13
-- Verze serveru: 10.4.27-MariaDB
-- Verze PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `somnia`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `education` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `candidate`
--

INSERT INTO `candidate` (`id`, `title`, `name`, `surename`, `email`, `tel`, `address`, `birthdate`, `education`, `language_id`, `note`, `job_id`) VALUES
(1, 'Ing.', 'Karel', 'Novák', 'karel.novak@gmail.com', '+420777888999', 'Adresa 123, České Budějovice, 370 01', '1991-05-20', 'Marketing', 4, 'Vcelku slušný člověk', 4),
(2, 'Mgr.', 'Jan', 'Nádeník', 'jan@gmail.com', '+420777888999', 'Adresa 123, České Budějovice, 370 01', '1995-01-01', 'Marketing', 4, 'Vcelku slušný člověk vydadá', 1),
(3, 'Mgr.', 'Jana', 'Špekáčková', 'spekacek@seznam.cz', '+420777444111', 'Bydleni 632, 37001 České Budějovice', '1996-07-18', 'Sportovní rybolov', 5, 'Na rybáře nevypadá', 6);

-- --------------------------------------------------------

--
-- Struktura tabulky `cc_state`
--

CREATE TABLE `cc_state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `cc_state`
--

INSERT INTO `cc_state` (`id`, `name`) VALUES
(16, 'Ostrá'),
(17, 'Předběžná'),
(18, 'Potenciál'),
(19, 'Storno'),
(20, 'Přeobjednat');

-- --------------------------------------------------------

--
-- Struktura tabulky `consultation`
--

CREATE TABLE `consultation` (
  `id` int(11) NOT NULL,
  `date_of_appointment` date NOT NULL,
  `consultation_number` varchar(255) NOT NULL,
  `consultation_status_id` int(11) NOT NULL,
  `place_of_consultation_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surename` varchar(255) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `meeting_time` datetime NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `psc` int(11) NOT NULL,
  `referrer_id` int(11) NOT NULL,
  `number_of_contacts` int(11) NOT NULL,
  `cc_state_id` int(11) NOT NULL,
  `sk_state_id` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `consultation_state`
--

CREATE TABLE `consultation_state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surename` varchar(255) NOT NULL,
  `referrer_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `psc` int(11) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `household_type_id` int(11) NOT NULL,
  `relationship_to_reff` varchar(255) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `commision_partner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surename` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `psc` int(11) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `corporate` int(11) NOT NULL COMMENT '1=YES, 0=NO',
  `ico` int(11) NOT NULL,
  `dic` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `order_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `customer_status`
--

CREATE TABLE `customer_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `delivery_method`
--

CREATE TABLE `delivery_method` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `delivery_method`
--

INSERT INTO `delivery_method` (`id`, `name`) VALUES
(1, 'první');

-- --------------------------------------------------------

--
-- Struktura tabulky `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(10, 'Obchod'),
(11, 'Call centrum'),
(12, 'Finance'),
(13, 'Lidské zdroje'),
(14, 'Vedení společnosti');

-- --------------------------------------------------------

--
-- Struktura tabulky `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `surename` varchar(255) NOT NULL,
  `kind_of_collab_id` int(11) DEFAULT NULL,
  `work_tel` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `work_email` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sex_id` int(11) DEFAULT NULL,
  `martial_status_id` int(11) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `personal_id_num` varchar(255) DEFAULT NULL,
  `op_num` int(11) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `permanent_residence` varchar(255) DEFAULT NULL,
  `mailing_address` varchar(255) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `type_of_comm_partner_id` int(11) DEFAULT NULL,
  `assigned_operator_id` int(11) DEFAULT NULL,
  `assigned_seller_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `employee`
--

INSERT INTO `employee` (`id`, `title`, `name`, `surename`, `kind_of_collab_id`, `work_tel`, `tel`, `work_email`, `email`, `sex_id`, `martial_status_id`, `birthdate`, `personal_id_num`, `op_num`, `nationality_id`, `permanent_residence`, `mailing_address`, `job_id`, `type_of_comm_partner_id`, `assigned_operator_id`, `assigned_seller_id`) VALUES
(1, 'Ing.', 'Tomáš', 'Matonoha1', 1, '111444777', '999555111', 'tomasek@somnia.cz', 'tomas@email.cz', 2, 4, '2023-09-05', '123456789/1594', 123456789, 3, 'Velké Náměstí 3, 383 01 Prachatice', 'fdsa', 2, 1, NULL, NULL),
(3, NULL, 'Nový', 'Zaměstnanec', NULL, '789654123', NULL, 'employee@domena.cz', NULL, 3, 4, '2023-03-22', '9+1235477212', NULL, 2, 'Trvalá 321', 'Adresa 123, 32152 Město', 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `employee_payment`
--

CREATE TABLE `employee_payment` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `bank_account_num` varchar(255) NOT NULL,
  `wage` int(11) NOT NULL,
  `hourly_wage` int(11) NOT NULL,
  `ico` varchar(255) NOT NULL,
  `dic` varchar(255) NOT NULL,
  `wage_conditions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `employment_contract`
--

CREATE TABLE `employment_contract` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `contract_number` varchar(255) NOT NULL,
  `contract_type_id` int(11) NOT NULL,
  `contract_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `indefinitely` int(11) NOT NULL,
  `resignation_period` int(11) NOT NULL,
  `date_of_signature` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `financing`
--

CREATE TABLE `financing` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_with_vat` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `household_type`
--

CREATE TABLE `household_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `household_type`
--

INSERT INTO `household_type` (`id`, `name`) VALUES
(2, 'Manželský pár'),
(3, 'Partnerský pár'),
(4, 'Jednotlivec'),
(5, 'Vdova / Vdovec'),
(6, 'Rozvedený/á'),
(7, 'Není známo');

-- --------------------------------------------------------

--
-- Struktura tabulky `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `workload` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `job`
--

INSERT INTO `job` (`id`, `name`, `workload`, `department_id`) VALUES
(1, 'Provizní partner', 'Doporučuje naše produkty a firmu svým zákazníkům a klientům', 10),
(2, 'Obchodní ředitel', 'Zodpovědný za vedení obchodu, Vedení spánkových konzultantů, Vedení Call centra, Dodavatelé, Odesílání zásilek, Infocentrum pro klienty / zákazníky', 14),
(3, 'Provozní ředitelka', 'Provoz, Marketing, Fakturace, Účetnictví, Skladové hospodářství', 14),
(4, 'Spánkový konzultant', 'Péče o klienty a zákazníky', 10),
(6, 'Operátor/ka', 'Vyřizování telefonické komunikace se zákazníky, Plánování schůzek', 11);

-- --------------------------------------------------------

--
-- Struktura tabulky `kind_of_collaboration`
--

CREATE TABLE `kind_of_collaboration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(4, 'cz'),
(5, 'sk');

-- --------------------------------------------------------

--
-- Struktura tabulky `martial_status`
--

CREATE TABLE `martial_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `martial_status`
--

INSERT INTO `martial_status` (`id`, `name`) VALUES
(3, 'Ženatý/Vdaná'),
(4, 'Svobodný/á'),
(5, 'Rozvedený/á');

-- --------------------------------------------------------

--
-- Struktura tabulky `method_of_receiving_ref`
--

CREATE TABLE `method_of_receiving_ref` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `method_of_receiving_ref`
--

INSERT INTO `method_of_receiving_ref` (`id`, `name`) VALUES
(1, 'druhý');

-- --------------------------------------------------------

--
-- Struktura tabulky `nationality`
--

CREATE TABLE `nationality` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `nationality`
--

INSERT INTO `nationality` (`id`, `name`) VALUES
(2, 'Česká'),
(3, 'Slovenská');

-- --------------------------------------------------------

--
-- Struktura tabulky `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `date_of_acceptance` date NOT NULL,
  `order_status` int(11) NOT NULL,
  `price_with_vat` decimal(10,0) NOT NULL,
  `financing` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `commision_partner_id` int(11) NOT NULL,
  `items` varchar(255) NOT NULL,
  `delivery_date` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `place_of_consultation`
--

CREATE TABLE `place_of_consultation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type_of_ref_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `method_of_receiving_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `sex`
--

CREATE TABLE `sex` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `sex`
--

INSERT INTO `sex` (`id`, `name`) VALUES
(1, 'Muž'),
(2, 'Žena'),
(3, 'Dneska se ještě nerozhodl/a');

-- --------------------------------------------------------

--
-- Struktura tabulky `sk_state`
--

CREATE TABLE `sk_state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `sk_state`
--

INSERT INTO `sk_state` (`id`, `name`) VALUES
(2, 'Přeobjednat'),
(3, 'Storno'),
(4, 'Zobchodován'),
(5, 'Neuzavřen');

-- --------------------------------------------------------

--
-- Struktura tabulky `tender`
--

CREATE TABLE `tender` (
  `id` int(11) NOT NULL,
  `tender_name` varchar(255) NOT NULL,
  `job_id` int(11) NOT NULL,
  `candidate_id` varchar(255) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `tender`
--

INSERT INTO `tender` (`id`, `tender_name`, `job_id`, `candidate_id`, `start_date`) VALUES
(1, 'Výběrové řízení 1', 4, '-2-3', '2023-08-01'),
(2, 'Výběrové řízení 1', 3, '-3', '2023-08-10'),
(3, 'Výběrové řízení 3', 6, '-2', '2023-08-03'),
(4, 'Výběrové řízení 4', 3, '-2-3', '2023-08-20'),
(5, 'Výběrové řízení 5', 2, '-2', '2023-08-30'),
(6, 'Výběrové řízení 6', 1, '-3', '2023-08-24');

-- --------------------------------------------------------

--
-- Struktura tabulky `type_of_commission_partner`
--

CREATE TABLE `type_of_commission_partner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `type_of_commission_partner`
--

INSERT INTO `type_of_commission_partner` (`id`, `name`) VALUES
(1, 'Masér/ka'),
(2, 'Fyzioterapeut/ka');

-- --------------------------------------------------------

--
-- Struktura tabulky `type_of_empl_contract`
--

CREATE TABLE `type_of_empl_contract` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `type_of_reference`
--

CREATE TABLE `type_of_reference` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `type_of_reference`
--

INSERT INTO `type_of_reference` (`id`, `name`) VALUES
(1, 'první'),
(2, 'třetí');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `cc_state`
--
ALTER TABLE `cc_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `consultation_state`
--
ALTER TABLE `consultation_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `customer_status`
--
ALTER TABLE `customer_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `delivery_method`
--
ALTER TABLE `delivery_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `employee_payment`
--
ALTER TABLE `employee_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `employment_contract`
--
ALTER TABLE `employment_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `financing`
--
ALTER TABLE `financing`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `household_type`
--
ALTER TABLE `household_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `kind_of_collaboration`
--
ALTER TABLE `kind_of_collaboration`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `martial_status`
--
ALTER TABLE `martial_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `method_of_receiving_ref`
--
ALTER TABLE `method_of_receiving_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `place_of_consultation`
--
ALTER TABLE `place_of_consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `sk_state`
--
ALTER TABLE `sk_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `type_of_commission_partner`
--
ALTER TABLE `type_of_commission_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `type_of_empl_contract`
--
ALTER TABLE `type_of_empl_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `type_of_reference`
--
ALTER TABLE `type_of_reference`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `cc_state`
--
ALTER TABLE `cc_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pro tabulku `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `consultation_state`
--
ALTER TABLE `consultation_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `customer_status`
--
ALTER TABLE `customer_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `delivery_method`
--
ALTER TABLE `delivery_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pro tabulku `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `employee_payment`
--
ALTER TABLE `employee_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `employment_contract`
--
ALTER TABLE `employment_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `financing`
--
ALTER TABLE `financing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `household_type`
--
ALTER TABLE `household_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `kind_of_collaboration`
--
ALTER TABLE `kind_of_collaboration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `martial_status`
--
ALTER TABLE `martial_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `method_of_receiving_ref`
--
ALTER TABLE `method_of_receiving_ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `nationality`
--
ALTER TABLE `nationality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `place_of_consultation`
--
ALTER TABLE `place_of_consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `sex`
--
ALTER TABLE `sex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `sk_state`
--
ALTER TABLE `sk_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `tender`
--
ALTER TABLE `tender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `type_of_commission_partner`
--
ALTER TABLE `type_of_commission_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `type_of_empl_contract`
--
ALTER TABLE `type_of_empl_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `type_of_reference`
--
ALTER TABLE `type_of_reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
