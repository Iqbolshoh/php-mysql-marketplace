CREATE DATABASE IF NOT EXISTS marketplace;

USE marketplace;

CREATE TABLE accounts (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  number VARCHAR(20) NOT NULL,
  email VARCHAR(255) NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(20) NOT NULL DEFAULT 'user',
  status ENUM('active', 'blocked') NOT NULL DEFAULT 'active',
  registration_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE categories (
  id INT(11) NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE products (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) DEFAULT NULL,
  category_id INT(11) DEFAULT NULL,
  seller_id INT(11) DEFAULT NULL,
  price_old INT(11) DEFAULT NULL,
  price_current INT(11) DEFAULT NULL,
  description VARCHAR(2000) DEFAULT NULL,
  rating DECIMAL(2,1) DEFAULT NULL,
  quantity INT(11) DEFAULT NULL,
  added_to_site TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
  FOREIGN KEY (seller_id) REFERENCES accounts(id) ON DELETE CASCADE
);

CREATE TABLE product_images (
  id INT(11) NOT NULL AUTO_INCREMENT,
  product_id INT(11) DEFAULT NULL,
  image_url VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE cart (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) DEFAULT NULL,
  product_id INT(11) DEFAULT NULL,
  number_of_products INT(3) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES accounts(id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE wishes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) DEFAULT NULL,
  product_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES accounts(id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

INSERT INTO accounts (id, name, number, email, username, password, role, status, registration_date) VALUES
(1, 'Iqbolshoh', '997799333', 'Iqbolshoh@gmail.com', 'Iqbolshoh', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'admin', 'active', '2024-05-14 11:17:25'),
(2, 'seller', '997733999', 'seller@gmail.com', 'seller', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'seller', 'active', '2024-05-14 11:17:25'),
(3, 'user', '993399777', 'user@gmail.com', 'user', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'user', 'active', '2024-05-14 11:17:25'),
(4, 'userAKA', '993399177', 'userAKA@gmail.com', 'userAKA', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'user', 'active', '2024-05-14 11:17:25');

INSERT INTO categories (id, category_name) VALUES
(1, 'Phone'),
(2, 'Tablet'),
(3, 'Computer'),
(4, 'Television');

INSERT INTO products (name, category_id, seller_id, price_old, price_current, description, rating, quantity) VALUES
('Tecno Spark 20', 1, 2, 350, 249, ' Display: 6.78 (2460x1080), Full HD, IPS; Screen refresh rate: 120 Hz; Screen features: touch screen, scratch-resistant glass, color screen. Number of main (rear) cameras: 3; Main camera resolution: 108 MP; Front camera resolution: 32 MP; Max. video resolution: 2K; Video recording (main camera): 1920x1080; Headphone output: mini-jack 3.5 mm. Processor: MediaTek Helio G99; Characteristics - frequency: 2200 MHz; number of cores: 8; 2x2.2 GHz Cortex-A76, 6x2.0 GHz Cortex-A55; video processor: Mali-G57 MC2; Built-in memory: 256 GB; RAM: 8 GB; Memory card slot: available. Battery capacity: 5000 mAh; Charging connector type: USB-C; Charging functions: fast charging. Number of SIM cards: Dual nanoSIM; Communication standard: 2G, 3G, 4G LTE, 2G/3G/4G (LTE), 4G; Wireless interfaces: Bluetooth, NFC, Wi-Fi, GPS. Features: accelerometer, gyroscope, light sensor, proximity sensor, compass, face recognition sensor, fingerprint scanner, pedometer. Authentication: face unlock, fingerprint scanner. Body type: classic; Body material: plastic; Protection level: IP53, IPX5; Smartphone weight: 206 g; Dimensions (WxDxH): 76.61x168.61x8.4 mm. OS version: Android 13 at the beginning of sales. Factory equipment: documentation, charger, protective film (sticky to the screen)', 5.0, 25),
('Smartfon Infinix Note 40Pro', 1, 2, 700, 399, 'Number of SIM cards: 2; Rear camera: 108 MP, 2 MP, 2 MP; Front camera: 32 MP; Screen size: 6.78; Screen refresh rate: 120 Hz; Screen technology: AMOLED; Storage capacity: 256 GB; RAM capacity: 12 GB; Operating system version: Android 14; Battery capacity: 5000 mAh', 5.0, 56),
('Samsung Galaxy A55', 1, 2, 690, 440, 'All IMEIs are officially registered and registration activation is carried out within 30 days. The manufacturer provides a 12-month warranty on its products. Processor CPU frequency 2.2 GHz, 2 GHz Processor type Octa-core RAM: 6GB / 8GB Available capacity (GB) 108.8 External memory support MicroSD (up to 1 TB) Screen size: 6.5 inches Battery capacity: 5000 mAh Storage: 128GB / 256GB Screen refresh rate: 90 Hz Front and rear camera: 13-50-5-2mp Screen Main screen dimensions 163.9 mm (6.5 inches) Main screen resolution 1080 x 2340 (FHD+) Main screen technology Super AMOLED Main screen color depth 16 million.', 5.0, 25),
('Samsung Galaxy A15', 1, 2, 290, 180, 'All IMEIs are officially registered and registration activation is carried out within 30 days. The manufacturer provides a 12-month warranty on its products. Processor CPU frequency 2.2 GHz, 2 GHz Processor type Octa-core RAM: 6GB / 8GB Available capacity (GB) 108.8 External memory support MicroSD (up to 1 TB) Screen size: 6.5 inches Battery capacity: 5000 mAh Storage: 128GB / 256GB Screen refresh rate: 90 Hz Front and rear camera: 13-50-5-2mp Screen Main screen dimensions 163.9 mm (6.5 inches) Main screen resolution 1080 x 2340 (FHD+) Main screen technology Super AMOLED Main screen color depth 16 million.', 5.0, 67),
('Samsung Galaxy S24 Ultra', 1, 2, 2000, 1500, 'Design: Sleek and modern design using high-quality materials. Operating System: Runs the latest Android operating system with Samsung One UI user interface. Network capabilities: Supports advanced communication technologies, including 5G, for high-speed Internet. Security and safety: Multiple authentication methods, including fingerprint and facial recognition technologies. Cameras: Revolutionary high-definition multi-camera system for professional photography and videography. All IMEIs are officially registered and registration activation is carried out within 30 days. The manufacturer provides a 12-month warranty on its products. Display: A stunning and stunning display with high definition and advanced display technologies. Performance: A powerful processor for maximum performance and responsiveness. Battery: Advanced power management technologies and a long-lasting battery with fast charging. Additional features: Waterproof, wireless charging, stylus support or other innovative features.', 5.0, 98),
('Xiaomi Redmi A3', 1, 2, 270, 120, 'The smartphone is equipped with an octa-core MediaTek Helio G36 processor, which provides all the necessary power for smooth everyday work. Official manufacturers warranty: 1 year. All IMEIs are officially registered (registration activation is carried out within 30 days). Thanks to the IP54 protection class, the smartphone is reliably protected from splashes and dust. The 90 Hz screen refresh rate makes gaming, multimedia or just scrolling content as smooth as possible. The main 8-megapixel dual-camera system is equipped with intelligent image processing algorithms, providing clear frames and rich colors. A stylish body with flat frames and a non-smudge back cover make the smartphone not only stylish, but also practical. A powerful 5000 mAh battery and support for fast charging ensure long battery life throughout the day', 5.0, 56),
('Infinix Hot 40', 1, 2, 260, 140, 'Large 6.56-inch HD+ display: for comfortable viewing of videos and photos Powerful Unisoc T606 processor: handles everyday tasks and light gaming Fast charging 18W: charges your smartphone quickly Fingerprint scanner: keeps your device safe 5000 mAh battery: provides up to 30 hours of video streaming NFC: allows you to make contactless payments for purchases 50 MP main camera: for bright and clear photos 32 MP front camera: for high-quality selfies', 5.0, 65),
('Apple iPhone 13', 1, 2, 2000, 900, 'All IMEIs are officially registered and registration activation is carried out within 30 days. (SIM card type: Nano SIM + eSIM) The manufacturer provides a 12-month warranty on its products. Super Retina XDR display 6.1-inch (diagonal) full-screen OLED display with a resolution of 2532 x 1170 pixels at 460 ppi Splash, water, and dust resistant IP68 rated under IEC standard 3 (maximum depth of 6 meters for 30 minutes) Dual 12MP camera system: Wide and ultra-wide cameras Processor type: A15 Bionic chip New 6-core processor with 2 performance and 4 efficiency cores New 4-core GPU New 16-core Neural Engine Cinematic mode for recording videos with shallow depth of field (1080p at 30 fps) Cinematic video stabilization (4K, 1080p, and 720p) Location Built-in GPS, GLONASS, Galileo, QZSS, and BeiDou Digital compass Wi-Fi Cellular iBeacon microlocationPower and battery Video playback: Up to 19 hours Video playback (streaming): Up to 15 hours Audio playback: Up to 75 hoursOperating system iOS 15 iOS is the worlds most personal and secure mobile operating system, with powerful features and designed to protect your privacy.Region code: RM/A and RK/A.', 5.0, 56),
('IPhone 15 Pro/Promax', 1, 2, 2100, 1500, 'Warranty - 12 months. IMEI 1 - officially registered (registration activation is carried out automatically within 30 days)Built-in memory - 128/256 GB / OS version - iOS 17Number of SIM cards Dual - nano SIM + eSimDisplay - 6.7 (2796x1290), 2K QHD, OLEDCamera - 48 MP/ 12 MP / 12 MPVideo shooting (main camera) - up to 4K 60 fps (3840x2160)Processor - Apple A17 Pro; Case material - TitaniumCharging connector type - USB-CCharging functions - wireless charging, fast chargingBattery capacity - Pro: 3274 mAh Promax: 4422 mAh', 5.0, 56),
('Honor X7b 8/128 GB', 1, 2, 420, 230, 'Official manufacturers warranty: 1 year. All IMEIs are officially registered (registration activation is carried out within 30 days). The smartphone has a powerful 48-megapixel main camera, which allows you to take high-quality photos and videos in different lighting conditions. The 8-megapixel front camera allows you to make clear selfies and video calls. A 6000 mAh battery provides long battery life, allowing you to use the device all day without the need for constant charging. This smartphone offers high performance, excellent camera functions and long operation on a single charge, which makes it an attractive option for a variety of users. The Honor X7B is equipped with a powerful Qualcomm Snapdragon 680 processor, which ensures fast and smooth operation of the device when performing various tasks, including launching applications, multimedia processes and playing games. The Honor X7B is a powerful smartphone with the Android 11 operating system, which provides modern features and security.', 5.0, 36),
('Xiaomi Redmi 13C', 1, 2, 290, 160, 'Refresh Rate: Up to 90 HzBrightness: 450 nits (typ), 600 nitsProcessor: MediaTek Helio G85Screen: Corning® Gorilla® GlassDiagonal display: 6.74 inches 1600x720, 260 ppiMain camera 50 Mp 5p lens, f/1.88 megapixel front camera f/2.0cinema camera / HDR mode / night mode / portrait mode / 50 Mp modeBattery: 5000mAh (typ) Supports 18W PD chargingSecurity: TouchID', 5.0, 59),
('Samsung Galaxy A24,', 1, 2, 400, 240, 'Processor: MediaTek Helio G99, 8 cores, 2.2 GHz RAM: 4 GB Built-in memory: 128 GB Screen: 6.5, 2340 * 1080, Super AMOLED, 90 Hz Main cameras: 50 + 5 + 2 MP Front camera: 13 MP Connectivity: 2G, 3G, 4G, Wi-Fi, Bluetooth 5.0, GPS Battery capacity: 5000 mAh IMEI registered 1 year warranty', 5.0, 96),
('Televizor AVAX Android 12 Smar', 4, 2, 300, 150, 'Antenna input port: 1 IEC connector for DVB-T / T2 / C / analog. Antenna input port (1 slot): Yes. Antenna input port type: IEC 169-2Energy efficiency class: A+. Power consumption: 74 W. Warranty 3 years. Made in Uzbekistan. Only 32 with voice control!DTV reception system: - DVB-T2; - digital tuner; - CL+LG panel; - S2; - LED TV. Receiving frequency range (DTV): - DVB-T: 174 MHz ~ 230 MHz; - 470 MHz ~ 860 MHz; DVB-C: 50 MHz ~ 858 MHz DVB-S/S2: 950 MHz ~ 2150 MHz;Product category: Smart Android 12. Built-in memory: 8 GBModes: high / bass / balance: yes. Audio output power: 12 W + 12 W. NICAM: MONO/DUAL 1/DUAL 2/STEREO. System input Tuner: 2 Composite: 1 HDMI: 3 USB: 2 Lan: 1 CI slot: 1', 5.0, 15),
('Televizor LiTV Android 12 Smar', 4, 2, 300, 140, 'Briefly about the product: Country of manufacture: UzbekistanEnergy efficiency (energy consumption) class A+Television type LEDOperating system Android 12Warranty period, from the manufacturer, 3 yearsSingle service center (99)-373-03-03To receive a warranty card, please contact the telegram @volto_talon', 5.0, 56),
('Televizor MoonX 43', 4, 2, 290, 150, 'Choose the diagonal you needAll models come with a remote controlBrand: MoonX43 Full HD - Smart TV, Bluetooth, Wi-Fi, 60 Hz, HDR, IPS, 2x speakers, Dolby Digital, HDMI, USB50 4K Ultra HD - Google TV, Bluetooth, Wi-Fi, 60 Hz, HDR, IPS, 2x speakers, Dolby Digital, HDMI, USB55 4K Ultra HD - Google TV, Bluetooth, Wi-Fi, 60 Hz, HDR, IPS, 2x speakers, Dolby Digital, HDMI, USBAll models come with voice control', 5.0, 65),
('Televizor QLT 32', 4, 2, 180, 130, 'Product overview: There are two remote controls in total: universal and voice controlWarranty period, from the manufacturer, 3 yearsQLT 32 9000 UM-S-LHD / QLT 43 9000 UM-S-FHDAndroid 12 operating system allows you to enjoy a wide range of applications and content via Smart TVProvides excellent image quality and ease of use thanks to modern technologiesModern frameless design, high HD resolution for a clear imageQLT 55 9000 UM-S-UHDEquipped with the WebOS operating system, which makes navigation and access to content even more convenientA modern device with a 4K Ultra HD screen that provides excellent clarity and deep colorsInnovative Magic remote equipped with Aero-mouse to facilitate interaction with the device is available', 5.0, 45),
('Televizor Samsung Crystal UHD ', 4, 2, 580, 460, 'Screen resolution: 3840 x 2160 (4K UHD) Refresh rate: 50 Hz Operating system: Tizen™ Smart TV Connectivity: Wi-Fi 5 (802.11 ac) / Bluetooth 5.0 / 3 X HDMI / 1 X USB / 1 X Ethernet / 1 X CI slot / Optical Audio output Audio output: 2 x 10 W Official manufacturers warranty: 1 year', 5.0, 56),
('smart televizori Xiaomi Mi TV ', 4, 2, 530, 430, 'Xiaomi Mi TV A2 with Full HD resolution allows you to see every detail with clarity and sharpness, bringing content to life right in your minds eye.Official manufacturer warranty: 1 year.Stay with Yandex AliceXiaomi Mi TV A2 43 " TV turns every frame into a true work of art. SK-technology ensures bright colors and image clarity even at wide viewing angles. Your viewing experience will be unique. Mi TV A2 is not just a TV, but also an entertainment center. Connect to your favorite streaming services, explore the world of applications and enjoy interactive content. The ultra-narrow frame design provides a high screen-to-body ratio, significantly exceeding the ratio of standard TVs. Thanks to the attractive metal frame and solid construction, Xiaomi TV A2 will become a bright detail in any interior. With its extremely compact dimensions, the Mi TV A2 32” TV fits perfectly into any space. The ideal 50 inches allow you to immerse yourself in the action and at the same time maintain a balance between image size and quality in a short time.', 5.0, 59),
('Smart televizor TCL 43', 4, 2, 560, 360, 'RAM - DDR3-2133: 2GB. Memory - eMMC5.0 16GBHDMI  HDCP Version - HDMI1.4  HDMI2.1, HDCP1.4  HDCP2.2Refresh Rate (Hz): 60Bluetooth 5.1 - yes. Google Assistant/Voice Search - yesInterface Style - Google TV UI + TCL TV UI. LED UHD Google TV. Android R.TV System - ATV: PAL-M/N, NTSC-M DTV: DVB-C/T/T2/S/S2. AV System - PAL, NTSC.Comes with one smart remote control with voice searchWarranty 3 years. Manufacturer TCL, China.For more information, please select the Contents, Dimensions or Details section', 5.0, 89),
('Smart televizor WellStars 32', 4, 2, 250, 130, 'Mahsulot haqida qisqacha: Model: 4300 - 43; 5500 - 55; 7500 - 70. 55-70 - UzDigital oqiydi.Ekranni yangilash tezligi - 60 Gts. Bluetooth - borRAM 4300 - 1 GB, 5500-7500- 1,5 GB; Xotira-8 GBIkkita masofadan boshqarish pulti, 1 ta ovozli boshqaruv. 5500-7500 modellari Magic masofadan boshqarish pultiga ega4300 - Android TV; 5500, 7500 - WebOS4300 - Full HD; 5500, 7500 - 4K Ultra HDImport texnika. Zavod tomonidan ishlab chiqarilgan.Ovozli qidiruv - borUSB - 2; HDMI - 3, DVB T2/S2 - borKafolat 3 yil. Xitoyda ishlab chiqarilgan', 5.0, 56),
('Televizor JVC 32N3105 HD Smart', 4, 2, 270, 140, 'Ultraingichka ramkali konstruksiya standart tv nisbatidan ahamiyatli ustun keluvchi ekran va korpusning olchamlarini yuqori nisbatini ta’minlaydi.Jozibali metall ramka va yaxlit konstruksiya sharofati bilan Xiaomi TV A2 har qanday interyerda yorqin detal bolib qoladi.Maksimal darajadagi ixcham olchamlar bilan, Mi TV A2 32” televizori har qanday fazoga juda yaxshi mos keladi.Maqbul 50 dyuymlar sizga harakatlarga shongib ketishga va shu vaqtning ozida tasvir olchami va sifati ortasidagi muvozanatni saqlab qolish imkonini beradi.', 5.0, 56),
('Televizor Sonor 32SNR100S Smar', 4, 2, 300, 140, 'Warranty - 1 yearMemory - 1 GBBuilt-in memory - 8 GBScreen resolution - 1366*768 (HDReady)Viewing angle (H/V) - 178°/178°Power output - 2x10=20wMatrix type - IPS panelSmart TV - AndroidCheck the product screen at the distribution point', 5.0, 26),
('Televizor Premier 32PRM700S Sm', 4, 2, 300, 150, 'Matrix type - IPS panel RAM - 1 GB Built-in memory - 8 GB Warranty - 3 years Screen size - HD (1280 * 720) Operating system - Android Check the product screen at the distribution point', 5.0, 56),
('Televizor Artel MF3300', 4, 2, 700, 599, 'Smart technology availableDiagonal size 43Screen refresh rate 60 HzWi-Fi support YesBluetooth YesScreen resolution 1920x1080 Full HD', 5.0, 56),
('Planshet Xiaomi Redmi Pad SE', 2, 2, 410, 220, 'Mobile Platform: Snapdragon® 680 4G Brightness: 400 nits Security: FaceID GPU: Qualcomm® Adreno™ Resolution: 1920 * 1200, 207 ppi Rear Camera 8MP f/ 2.0 rear camera, 1.12 micron pixel size Battery Charging: 8000 mAh Audio: 3.5 mm headphone jack 1080P 1920 * 1080 30fps, 720P 1280 * 720 30fps No SIM card slot on the tablet', 5.0, 26),
('Planshet Oukitel OT6, 2024 mod', 2, 2, 180, 120, 'Android 13 operating system 4 to 16 GB RAM 64 GB internal storage 10-inch FHD+ display Safe tablet for children 8000 mAh battery', 5.0, 59),
('Smart planshet CCIT A 103 PRO', 2, 2, 340, 160, 'Full Screen 10.1 800*1280Battery: Built-in 5800 mAh lithium batteryConnectivity: Wi-Fi, Bluetooth, USBIMEI readyDual SIM tabletRAM: 8 GB, 512 GBOperating system: Android 10.0Camera: 5.0 MP front camera, 13.0 MP rear cameraPackage: Tablet, keyboard, case, protective glass, stylus, charger, headphonesLanguages: Russian, Uzbek, English, etc.', 5.0, 59),
('5.0 ( 101 baho ) 400 ta buyurt', 2, 2, 810, 440, 'Rear Camera: 13MP 4k | 30fps1080p | 30/60fps720p | 30fps Front Camera: 8 MP 1.12µm f/2.21080p | 30fps720p | 30fpsBattery Charging: 8840 mAhWired Charging: 33 WSupports Fast Charging: QC4 / QC3+ / QC3.0 / QC2.0 / PD3.0 / PD2.0 / MI FC1.0 Fast ChargingBluetooth 5.2, WiFi 6, 4 microphones, 4 speakersOperating System: MIUI Pad 14, Android 13Processor: Qualcomm Snapdragon 870Size: 11-inch display (2880 * 1800)The tablet does not have a SIM card slot', 5.0, 59),
('Planshet Modio M28', 2, 2, 250, 160, 'Operating system: Android 10.0 RAM: 6 GB/128 GB Processor type: Octa-core Camera: Front camera 5.0 MP, rear camera 13.0 MP Media ports: MicroSD memory card up to 128 GB Connectivity: WiFi, Bluetooth, USB USB: micro USB 2.0 version Battery: built-in 6000 mAh lithium battery Sold by Imeika', 5.0, 58),
('Planshet Nextbook BRT81', 2, 2, 210, 110, 'Charging connector type: USB Type-C Case gift SD memory: microSD up to 128 GB RAM: 3 GB Display: IPS x 10.1 Main camera: 1 x 5 MP Front camera: 1 x 2 MP Android version: Android 10 Internal memory: 16 GB SIM card does not support backup', 5.0, 26),
('Smart Planshet, A1000 Pro,', 2, 2, 250, 120, 'RAM: 4 GB, 128 GBThe tablet supports 4G LTE and 5G networks The tablet is based on the ANDOD11.0 operating system, which plays a key role in ensuring its functionality and performanceCamera: 8.0 MP front camera, 13.0 MP rear camera', 5.0, 15),
('Planshet Blackview Tab 80', 2, 2, 340, 210, 'The manufacturer provides a 1-year official warranty. Android 13 is the latest version of the operating system, which offers improved performance, new features, and enhanced security. Updating your smartphone to this version will provide a smoother and more convenient experience. The device has 128 GB of internal memory, providing ample storage for data and applications. With 4 GB of RAM, multiple applications can run smoothly and quickly at the same time. The 7680 mAh battery ensures long battery life of the device. This allows you to use it without frequent charging and enjoy long standby or active use. The 13-megapixel main camera and 8-megapixel front camera provide high-quality photos and videos, making it easy to take bright, clear photos and make high-definition video calls. Wi-Fi 802.11 a/b/g/n/ac for fast communication, Bluetooth 5.0 for easy connection, dual SIM slots for 2 SIM or 1 SIM + 1 TF card, and 2G/3G/4G bands for mobile communication. .The 10.1-inch IPS screen with 800*1280 HD resolution provides clear and vivid images. With a 16:10 aspect ratio, it is ideal for viewing and working. The 8-core Unisoc T606 processor provides high performance on mobile devices. Its powerful architecture guarantees fast data processing and a smooth multimedia experience.', 5.0, 26),
('Planshet Blackview Tab 13 Pro ', 2, 2, 430, 280, 'Display: 10.1-inch FHD+ IPS LCD, 16:10 ratio Processor: MediaTek Helio G85 Android 13 OS version Memory: 8 GB Storage: 128 GB, expandable up to 1 TB via microSD card slot Battery: 7280mAh Dimensions: 238.8 x 157.6 x 7.7mm Weight: 450g Operating system: Android 13 is designed for your security. SIM: 2 SIM cards', 5.0, 36),
('Planshet Blackview TabActive 8', 2, 2, 550, 460, 'Operating System Android 12 Screen Diagonal 10.36 Screen Type IPS Processor Model MT8781 Helio G99 8 GB RAM 256 GB Internal Memory Battery Capacity 22000 mAh 12 Month Warranty', 5.0, 25),
('Planshet Blackview Tab 18', 2, 2, 550, 450, 'The manufacturer provides a 1-year warranty. IMEI registration is officially completed within 30 days. Android 13 is the latest version of the operating system, which offers improved performance, new features, and improved security. Upgrading your smartphone to this version will provide a smoother and more comfortable experience. The MediaTek Helio G99 processor with 8 cores and a clock speed of 2.2 GHz provides powerful and responsive processing, while maintaining the devices high performance in various tasks. 8 GB of RAM ensures fast and smooth operation of the device, processing applications and multimedia content with high efficiency. The 8800 mAh battery with 33 W fast charging provides long battery life and fast charge recovery, allowing you to use your device to the maximum without interruption. The 11.97-inch diagonal 2000x1200 IPS screen provides bright, clear images with wide viewing angles, ideal for viewing and working with content. 256 GB of built-in memory provides ample storage space for data, applications and multimedia content on the device.', 5.0, 15),
('Planshet Teclast T40 Air 10', 2, 2, 400, 280, 'In addition to this capacity, it also includes a 256 GB memory chip and supports Micro SD card expansion up to 1 TB, providing a storage solution that perfectly suits your needs. The Teclast tablet runs on the latest Android 13 operating system. One of the useful things in this regard is the SIM card slot, which allows you to always be in touch and does not depend on the availability of Wi-Fi. There is also GPS, so the gadget can serve as a navigator. A 7200 mAh battery with a capacity of 18 watts is responsible for autonomy. The octa-core Unisoc T616 processor provides sufficient performance for simple tasks. Immerse yourself in unprecedented image quality with our 10.4-inch fully laminated IPS display. With a resolution of 2000 x 1200 2K and an ultra-wide viewing angle of 178 °, the T40 Air offers uncompromising image quality.', 5.0, 26),
('Oyin monitori 2E Gaming 27', 3, 2, 360, 210, 'Number of colors: 16.7 million - Diagonal: 27 - Refresh rate: 165 Hz - When connected via DisplayPort, 165 Hz is output, when connected via HDMI, it is output less than 165 Hz - Matrix type: VA, CURVED - Frameless display: Yes - Interfaces: 2xHDMI, Audio 3.5 mm, DisplayPort - Resolution: 1920x1080 - Brightness: 300 cd/m2', 5.0, 15),
('Noutbuk Asus TUF GAMING Intel ', 3, 2, 1500, 1000, 'Processor: Intel Core I7-11800H Video Card: Geforce RTX 2050 Display: 1920 x 1080 FHD 15.6 inch RAM: 8 GB Storage: 512 GB Warranty: 12 months', 5.0, 15),
('HP Victus 15 - 15,6', 3, 2, 920, 860, 'Camera - HP Wide Vision 720p HD camera with ambient noise reduction and integrated dual array microphones Keyboard - Full-size backlit English-Korean keyboard with numeric keypad Warranty - 1 year from date of purchase for free repair Processor - AMD Ryzen 5-7535HS Max clock speed 3.3 GHz to 4.5 GHz (6 cores, 12 threads) HexaCore (16 MB L3 cache) Memory type - 8 GB DDR5-4800 MHz RAM (1 x 8 GB) Transfer rate up to 4800 MT/s. 1 x 8 GBTotal Memory - 512 GB PCIe® Gen4 NVMe™ TLC M.2 SSDGraphics Memory - NVIDIA® GeForce RTX™ 2050 laptop GPU (4 GB GDDR6 dedicated)Screen Size - 15.6 diagonal FHD (1920 x 1080), 144 Hz, IPS, narrow bezel, anti-glare, 250 nits, 45% NTSCWireless - MediaTek Wi-Fi 6 MT7921 (2x2) + Bluetooth® 5.3 (supports gigabit data rates) Supports MU-MIMOUSB Ports - 1 USB Type-C® 5 Gbps data rate (DisplayPort™ 1.4, HP Sleep and Charge); 1 USB Type-A 5 Gbps data rate (HP Sleep and Charge); 1 USB Type-A port with 5 Gbps data rate;', 5.0, 59),
('MSI GF63 12UCX 8/512 Nvidia RT', 3, 2, 980, 830, 'CPU: Intel core I5-1245(8 cores, 12 cores)(E-core up to 4.4GHz). GPU: RTX 2050 4GBSSD: 512GB M2 NVMe PCle (2slots) RAM: 8GB DDR4 3200MHz(2slots) Display: 15.6 FULL HD (1920*1080), IPS, 250nits,144HzBattery: 52.4 WH', 5.0, 29),
('Noutbuk Lenovo LOQ, i5', 3, 2, 2000, 800, 'Processor: Intel Core i5-12450H Number of processor cores: 8 Number of processor threads: 12 Processor base frequency: 2 GHz Maximum processor frequency: 4.4 GHz Video card: NVIDIA GeForce RTX 2050 4GB Screen: 15.6 inch Full HDR GB Backlit keyboard Windows 11 installed A laptop tailored for modern gamers', 5.0, 35),
('Noutbuk Acer Aspire 3 Core i3', 3, 2, 850, 470, 'Product Overview: Screen: Diagonal 15.6-inch Full HD (1920x1080), 16:9 aspect ratio, TN matrixProcessor: Intel® Core™ i3-1215U 6-core 8-thread 4.40 GHz 10 MB cacheRAM: 8 GB DDR4Hard drive: 512 GB PCIe® NVMe™ M.2 SSDVideo card: Intel UHD GraphicsPorts: 1x USB 3.2 Gen1, 1x USB 3.2 Gen1, 1x HDMI, 1x USB 3.2 Gen 2 Type-C portsWi-Fi/Bluetooth: Wi-Fi 5 (802.11 ax) + Bluetooth 5.1Battery: 40Wh, 3S1P, 3-cell Li-ion batteryWindows installed1 year warranty', 5.0, 19);

INSERT INTO product_images (product_id, image_url) VALUES
(1, '458258f7c743f74c3e7bd080d895f1a3.jpg'),
(1, 'cf924cf99ddd1c37f919cb130b756295.jpg'),
(1, '898b90e0f4dea1ade41cccf6902456ce.jpg'),
(1, '997bac00f2d4e7e5ea7c277bf2f94c79.jpg'),
(2, '4d0a7ffd5f70bc3237396812fa1a4bd9.jpg'),
(2, '0b157c413d7f06b752b4992508f556f4.jpg'),
(2, 'e75dc465413c000ed81a47c932775c90.jpg'),
(2, '0f6d8bbf4f6bc905c09ea10c183fb35e.jpg'),
(2, '1cc549ff388d403c884e2b873150762b.jpg'),
(3, '638d329c609fa117e046a8ed9ab06457.jpg'),
(3, '7eda294377cd22c7ad0a834515bd842f.jpg'),
(3, '93ef2268eea9572b8faa86dd53cea0f6.jpg'),
(3, '75efd260bb35da2d2d09faefa78ffe82.jpg'),
(3, '1d99c410a12b99307f13bd05bf9b5712.jpg'),
(3, 'ff328316228781109f9ab0aba5470e10.jpg'),
(3, '1b62fd562db438ad2df08cd263165c09.jpg'),
(4, '4e3d97fc71606572c2ca1cae1d7dbff6.jpg'),
(4, '8822f0004794b8593104b57a976e6d24.jpg'),
(4, '6671a3795c8de9c5e8263fd76ab52887.jpg'),
(4, 'f7442669a7ae52e5cc3db22f9c865ca8.jpg'),
(4, '9041dea1db309f507030f8cec1fe88cf.jpg'),
(4, '91edfe923eb8df15d595daefef468a79.jpg'),
(4, '0844d354129b145adce6f880a3a8f8f5.jpg'),
(5, 'f2312561a2f0d39aebd41714cd6d87ae.jpg'),
(5, '12cb3f2afdf8d09ee9bc888ea92a18fe.jpg'),
(5, 'da7e34f9dbe36379f32424796d8656cb.jpg'),
(5, '24e93cca3f0fab8b3e271aa7d92f5c50.jpg'),
(5, '90e1917d597eead243b1d784fd53de55.jpg'),
(6, '5015939a6f1c5feb5e950759d295ac4d.jpg'),
(6, '96ed00fdcfaf3014b2a9b02b5076e7e9.jpg'),
(6, '36df19ff671f525d22522badc8d047f1.jpg'),
(6, '9454e7a42dbc8b18f85e62b104e9488d.jpg'),
(7, 'e0373f19573bfefc42357210e725807d.jpg'),
(7, '21a9de559e79b661d72f95575f558585.jpg'),
(7, '8fafc6c13af1a54f4791c42c07788044.jpg'),
(7, '9d6882cf6f9d0b31e00ed2c0d1c22b7f.jpg'),
(7, '8779add0b466b6b48704629fcabc5af3.jpg'),
(8, 'c99d57f33e755f9116ec801783017213.jpg'),
(8, '8bf6072b78b7b60a57a9eeeccbd47c5d.jpg'),
(8, '61a224e77e6782a14671758e9791972e.jpg'),
(8, 'e4bd23bb0b90564ae0869cc51ee0229c.jpg'),
(8, '44a9a43d24c06488989ab3bab7489eed.jpg'),
(9, '089a18ece6adb85a3cf1ef4f39813444.jpg'),
(9, 'e523dbd3d40abad54cb6a91b9b36ace5.jpg'),
(9, '90e0a8f45f6535244524d9a3fd539953.jpg'),
(9, '918ba210ecfecf35666cdcdd2616bfb9.jpg'),
(9, 'e83ba80c89cefbd93ef64fbf762b298c.jpg'),
(9, 'fd47b69cc72e642aea0facb2b3beb30f.jpg'),
(10, '2091ee89dca220551cb84586e5c48904.jpg'),
(10, 'bcb04c75dd826465f5b5f4b6344aec3b.jpg'),
(10, '497871762791694c61bc02453f152058.jpg'),
(10, 'ad7993122f78a7c0167eee2ebfc00740.jpg'),
(10, '5536386cd7b4e20d171c35ac09f9fc5e.jpg'),
(11, 'a3342e27aeb7909fc741b199033d62b9.jpg'),
(11, '09cd4b13082feb1c6ff320eb3ca22251.jpg'),
(11, 'f0e3320c9a9dc6a341cf6f79138ddf4a.jpg'),
(11, 'b827142297e909438033ef8853fb1dc5.jpg'),
(11, '391d3336cceec2e7ddb7b8e54230c1ef.jpg'),
(12, '9fa7afd8c98109c880e0f8d0d5c6d4d0.jpg'),
(12, 'ae25848c0780155e464e514d121454fa.jpg'),
(12, '3847e2c4a68fd8fb6316ec73ace12a91.jpg'),
(12, '858c2cf848addfb25f80f4ca7bc491b5.jpg'),
(12, 'e45c1ed9ad7566f43a1857b717a29829.jpg'),
(12, 'cbff30c696178c9c2f939feeaca5ae95.jpg'),
(12, '7cffc9f71300ed7f6c00c779a6168f9e.jpg'),
(13, '35a4a5c678bfae5748a588aa0f186f19.jpg'),
(13, 'dd2754bbc7954a354ee76d251b4b65f9.jpg'),
(13, 'c30249ff4ef6f23a72b7260edfc83422.jpg'),
(14, '42d482e852b7a651f87bab8d10a9d86e.jpg'),
(14, 'c6b677e4e71947084941fe43c4c8138e.jpg'),
(14, 'f16161596b4f418d1897cb98c7ee7db2.jpg'),
(14, '19830fde50ac9e88b907eb5bbebb9c37.jpg'),
(14, '2c613a93104e0d7fa229212c37caaac9.jpg'),
(15, '4a4ec440ba88ee1d7b8cd2f51f61811e.jpg'),
(15, '6338b44c442a1f9cb278ccb1bb04e1d8.jpg'),
(15, '119f91613d442076b9894d687d463f68.jpg'),
(16, 'a846709bb01f4b8e939224573a3a234e.jpg'),
(16, 'c52148c225380efe2b6252006da60aa1.jpg'),
(16, 'a728263d4da88e62f416ead460dc6f26.jpg'),
(16, 'a63d1431eb10e7eb224d8e8a1690461f.jpg'),
(16, '7032fc119311917227c8e48508ee8e42.jpg'),
(16, '56083912fd094b81315432a56a3affcf.jpg'),
(16, '5cfeed277e27bf3b6f217b9241cca0d8.jpg'),
(17, '6ca98d9fd5ca459a52e78915bf7aea76.jpg'),
(17, '00907decda1adf99b6c54c688aa9dcb9.jpg'),
(17, 'f1cea8fd52db31786a3c68c0babf0ffa.jpg'),
(18, 'c3479ef525cf17c4417d57a5d89a4e27.jpg'),
(18, '3f24fe8d20a3e828f88c9a852c6674a5.jpg'),
(18, '8565cc17c438b32f85d10229ca92574e.jpg'),
(19, 'f0f72198ddd3cb600d8abe5931a61d3a.jpg'),
(19, 'bb60357ac0a5ca2b8cd050ce4f789896.jpg'),
(19, 'b5aba770a6f9b93dcfbdfaee4b5e5589.jpg'),
(19, '122933dfa4b9df16199bf99ccb2760e5.jpg'),
(19, 'd2a263d0e5cea54e7376a93662a0ad9a.jpg'),
(19, 'fd0b16ca2e825c4cef9f3db1558a10af.jpg'),
(20, 'b6c7b34a14e4f3723fe3d288cde3afb5.jpg'),
(20, '4627a6056f01c6a191ddef37628ab4dd.jpg'),
(20, '6740c4ba9050f8f9d03925bf991eba80.jpg'),
(20, 'a7ea3c7b7a855429d617094da729a0e1.jpg'),
(21, '2ff7f56f592acddfb30dc76ff90b1683.jpg'),
(21, '60271212434632cbf4ef2f7d67ff4ae3.jpg'),
(22, '7da9501e896b923982dc78162bb7d122.jpg'),
(22, 'a5c905c3d6d08dbebc2849a4caf10438.jpg'),
(22, '80eaa11545fb1c3ac5e069d48cc82e94.jpg'),
(22, 'aa2515baa965fbc4916fa3755963d759.jpg'),
(22, '318ccea555e65598235d084c0ca3f601.jpg'),
(23, '38c78d71878af1fdf921ad1c1f97360c.jpg'),
(23, 'bee5b572b42ef02da951bc4491925dde.jpg'),
(23, '32f1d473cb661ef81a75cde97fa00935.jpg'),
(23, '95744d78648c1560671b988bdc3f3530.jpg'),
(23, '60080c1e3f5047fac482bdfc14611fb9.jpg'),
(24, '820d783934a2515680a2eb5b0e3f41c7.jpg'),
(24, '7f894738b084d0980a08d3f2cd8b5f99.jpg'),
(24, '59f51bd397a621cb928bb91a033f7f35.jpg'),
(25, 'f71bc45752c3beca0086878b866dde45.jpg'),
(25, '8c2971b27e00433d3fe1479f91d7e4ec.jpg'),
(25, 'a702ea3856fbfa930d83f5e52ce46fe1.jpg'),
(25, '561b318a27125d7d275e46f1fe22f4e2.jpg'),
(25, '6547579fb261c6f51a3460bab6ace4fc.jpg'),
(26, 'c6be63659ef005e276df4b299db88d74.jpg'),
(26, '534380921fc3834e9ee73be03eb17b99.jpg'),
(26, '0e85bf3bf647a5dc55c80fcdecddea78.jpg'),
(26, 'c6f9911aeb19f6da16d99a09240f38c5.jpg'),
(26, '79a0bd0953a141feb2fa85beece6f564.jpg'),
(27, 'e63e40700bc58ff5f579089bf381ab89.jpg'),
(27, '579bf10148a8860d62213a4a22824f91.jpg'),
(27, 'aff6251853823f2d7b8a8f65b9cab709.jpg'),
(27, 'bfa332ff7bc59a9c117273890ad20d15.jpg'),
(27, '4b961d175ae80b09ee3053a95444d8da.jpg'),
(28, '97f01c0ea0b0ff4c445ccfa1ac686329.jpg'),
(28, '625688de31d74041899cd1f5ad229a59.jpg'),
(28, '600c4b60acb71965c95c182c7c494c4d.jpg'),
(28, 'b5db4a1789622dbdd501d88a8eef732a.jpg'),
(28, 'f862f94878a62490440a6f55885aabec.jpg'),
(29, '04ecc2a61ffb0ed0b99c684275633cc2.jpg'),
(29, '255030c02e45a819bf639e1893ee79d0.jpg'),
(29, '8ec179d608a06d28c1f54284fb325c30.jpg'),
(29, 'a2a0476423963aa6fccbb0e6b80f6374.jpg'),
(29, '6cfd588fd540ffc130e5332bb82b806a.jpg'),
(30, '1dd28b34843aee3e7c963963064b71bf.jpg'),
(30, 'f6d27e6ab4c23c339df98377e3d976f1.jpg'),
(30, '19e67e0595f789d16d26b7c8d512e5a1.jpg'),
(31, '7806cfe14f92c120a08689d2d9ba6fd6.jpg'),
(31, '2f228ac5f8c5fd5488224378bba5be32.jpg'),
(31, '38ee1882fdcbaad5867999d8b5e7a6ee.jpg'),
(31, '4c7d5078ce5113e5ebd2ae5c885837eb.jpg'),
(31, '0570e30373d15989a408497eb219c378.jpg'),
(32, 'c96efd1feeac55dfa1932252a8458107.jpg'),
(32, '2d036cb647f0ab0de66e91c3b1ed8aef.jpg'),
(32, '8a62bee2145282df0091f6f016b3627d.jpg'),
(32, '700467d09012108b533881014b0509f7.jpg'),
(32, '93bc9f41d7a8bf9638a14482d946a40d.jpg'),
(33, '5507b84a47dbb171114a63ee61e5e20e.jpg'),
(33, '6aa169e24c6491605fdc53d361bebc57.jpg'),
(33, '175cad66b54eaa15101e24c365237c40.jpg'),
(33, 'abbab0641d587eb43d28da4f6dff05b2.jpg'),
(33, '9e6313dffda6f5586680d62dc0963338.jpg'),
(34, 'c198311104de79a98d3cabdfaf124c5a.jpg'),
(34, '45f6201269970a864cb0b1bc573a8360.jpg'),
(34, 'b2d126eea7056590345931e44ba9fb6c.jpg'),
(34, 'ce021f8659735c7bf3f7d347681e07fd.jpg'),
(34, '247397d25f09af5c3c7fcf2ac78e5a4c.jpg'),
(34, '7ab5ffe0bdf2c7902a4fe2325fcd9074.jpg'),
(35, '14eac314fa5767c5636bf4fc6fc2de67.jpg'),
(35, '261272230e2150321280cc9a1b5a9dc8.jpg'),
(35, 'a446ecbfff77dab6541f6e7487ba46b5.jpg'),
(35, '08bf30bc7d022367e0b69222012da869.jpg'),
(35, '574570a664371973100396931919204f.jpg'),
(36, 'a7ffea103b90ddcffd2ddb75b863e248.jpg'),
(36, 'aa4b8f49c7319f448b86939efb53b464.jpg'),
(36, 'c9cec99f0218c6863694d7aaf8a5c22b.jpg'),
(36, 'b0a969277db8f6007a8f2d4a054734f7.jpg'),
(36, 'c8b84f7ca1e1624062c76fcb7e2dfa37.jpg'),
(37, 'd65465b64363e9bd6b1897a589800433.jpg'),
(37, 'a57db396144181fed7c97c7502878e21.jpg'),
(37, 'f9739ffe6e91d6027d866c8eecef0168.jpg'),
(37, '5d42b5021b6a1d50638805756e8d2f07.jpg'),
(37, '94e5687372ca010373980dc511cbb041.jpg'),
(38, '55616eb462ea96785b8502829ea24728.jpg'),
(38, '3404259f53c8c96415d8558118c11584.jpg'),
(38, '3039c7c2fcb54915d7b67ba1c1b53b2c.jpg'),
(38, 'd315c5e3b229bd8483650910343ca20b.jpg'),
(38, '0e030f3b6abdf1164c6cf0a2cb8a8833.jpg'),
(39, '848750ec5d458bf13d4f78779aefaade.jpg'),
(39, '0885235951267fd9e415761b9b6d8696.jpg'),
(39, '17f6ee256d50f8589489e47e93128c3f.jpg'),
(39, '1d2b623a77f8d356951dc2b0f003e857.jpg'),
(39, '82ddf475fcdb69360a302cb9c91bfd5f.jpg'),
(40, '2fd33258a9495c899b9158f4c8e77e6e.jpg'),
(40, '0d29c695facc01ef60217222e8fd90c8.jpg'),
(40, '2ccd1d50d56a125d9427625fdc790ebb.jpg'),
(41, 'ce4a76259adb007bcab1be415d78a1b3.jpg'),
(41, '46864d7a3b751007d875e3441bfde4ea.jpg'),
(41, 'fc501026d75be9d602ca99b7d4e3a00d.jpg'),
(41, 'ba21e6910cd90b90ba0f7b4744fbbf31.jpg'),
(41, '0f8fd54260d152f75576bb8f500af671.jpg'),
(42, '54a1f1a251953a88e2d49e4f269279da.jpg'),
(42, '9d3fef7e16fa38c48d6fb5e5a9e20032.jpg'),
(42, 'aa438c33dcba65d37df285216c87b80e.jpg'),
(42, '1946829af6c4d628f5116dc78297f350.jpg'),
(42, 'd02a4f5c9b6244c8b7ec8bd58c12fca8.jpg');