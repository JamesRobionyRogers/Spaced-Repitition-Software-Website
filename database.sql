-- Setting up the db tables 

CREATE TABLE IF NOT EXISTS subjects(
    subjectID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    subjectName TINYTEXT NOT NULL,
    subjectImg VARCHAR(1025)
);

CREATE TABLE IF NOT EXISTS questions(
    questionID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    subjectID INT UNSIGNED,
    FOREIGN KEY (subjectID) REFERENCES subjects(subjectID),
    questionText VARCHAR(1024) NOT NULL,
    media VARCHAR(1024), -- USED FOR URLS TO IMGS, GIFS, ETC... 
    questionType ENUM("both", "text", "multi") NOT NULL

    -- Question Types:
    --   0 = BOTH Question Types
    --   1 = Text box ONLY
    --   2 = Multi-choise ONLY
);

CREATE TABLE IF NOT EXISTS correctAnswers(
    correctAnswerID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    questionID SMALLINT UNSIGNED,
    FOREIGN KEY (questionID) REFERENCES questions(questionID),
    correctAnswer VARCHAR(255) NOT NULL, 
    priorityAnswer BOOLEAN NOT NULL
);

CREATE TABLE IF NOT EXISTS incorrectAnswers(
    incorrectAnswerID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    questionID SMALLINT UNSIGNED,
    FOREIGN KEY (questionID) REFERENCES questions(questionID),
    incorrectAnswer VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS highscores(
    highscoreID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    subjectID INT UNSIGNED,
    FOREIGN KEY (subjectID) REFERENCES subjects(subjectID),
    highscore TINYINT NOT NULL, 
    initials VARCHAR(255) NOT NULL
);



-- Inseting data into tables 

-- Adding Subjects Data
INSERT INTO subjects(subjectID, subjectName, subjectImg)
    -- use NULL for the AUTO_INCREMENT column
    VALUES  (NULL, "Ngati Toa", "./imgs/undraw_ngati-toa.svg"),    
            (NULL, "Onslow College", "./imgs/undraw_onslow-college.svg"),    
            (NULL, "Johnsonville", "./imgs/undraw_johnsonville.svg"), 
            (NULL, "Wellington", "./imgs/undraw_wellington.svg"), 
            (NULL, "School Values", "./imgs/undraw_school-values.svg");

-- Adding Question Data
INSERT INTO questions(questionID, subjectID, questionText, media, questionType)
    -- use NULL for the AUTO_INCREMENT column
    VALUES  
        -- Ngati Toa Questions 1 - 15
        (NULL, 1, "What is the full name of the Ngāti Toa iwi?", NULL, "both"), 
        (NULL, 1, "What does ‘rangatira’ stand for?", NULL, "both"), 
        (NULL, 1, "When was Te Rauparaha born?", NULL, "multi"), 
        (NULL, 1, "Te Rauparaha is the author of which famous Māori haka, popularly known for being performed by the All Blacks?", NULL, "text"),
        (NULL, 1, "What does the ‘mate’, from the Ngāti Toa haka penned by Te Rauparaha, stand for?", NULL, "both"),
        (NULL, 1, "How many marae does Ngāti Toa have?", NULL, "both"),
        (NULL, 1, "How many marae does Ngāti Toa have on the North Island?", NULL, "both"),
        (NULL, 1, "Ngāti Toa emigrated southward from which region?", NULL, "both"),
        (NULL, 1, "Ngāti Toa are descendents of Hoturua, captain of which waka (canoe)?", NULL, "both"),
        (NULL, 1, "The people of Ngāti Toa who did not migrate south became which tribe?", NULL, "both"),
        (NULL, 1, "What does 'rohe pōtae' (in all lower case) mean in English?", NULL, "both"),
        (NULL, 1, "Alongside the Te Āti Awa iwi, Ngāti Toa operates which radio station inthe Wellington region?", NULL, "multi"),
        (NULL, 1, "Tupahau led around 300 warriors against Tamure's army of…", NULL, "both"),
        (NULL, 1, "Today, Ngāti Toa operates health services under the name…", NULL, "both"),
        (NULL, 1, "Who headed Ngāti Toa's migration southward?", NULL, "both"),
        
        -- Onslow College Questions 16 - 30
        (NULL, 2, "In what year did Onslow College open?", NULL, "multi"), 
        (NULL, 2, "In what decade did Onslow College abolish the school uniform following a student rebellion?", NULL, "multi"),
        (NULL, 2, "In the school’s motto ‘Levavi oculos meos in montes’/‘Ka anga atuaku kanohi ki nga maunga’, what does ‘oculus’/‘kanohi’ mean in English?", NULL, "both"),
        (NULL, 2, "The school has two versions of its motto ‘Lift your eyes to the hills’. One is in Māori, one is in … what other language?", NULL, "both"),
        (NULL, 2, "In 2021, Onslow College adopted five new values: whenua, whakapapa, diversity, community … name the missing value:", NULL, "both"),
        (NULL, 2, "What is the Māori name for Onslow College?", NULL, "both"),
        (NULL, 2, "For whom is Onslow College named?", NULL, "both"),
        (NULL, 2, "Onslow College sits beneath what mountain, currently named Mount Kaukau?", NULL, "both"),
        (NULL, 2, "When was the building now called Te Ara a Maui completed?", NULL, "both"),
        (NULL, 2, "When did Onslow College implement the new school values?", NULL, "both"),
        (NULL, 2, "What is 'kākā' in English?", NULL, "both"),
        (NULL, 2, "Who is the current principal?", NULL, "both"),
        (NULL, 2, "Building of the new buildings is expected to take at least…", NULL, "both"),
        (NULL, 2, "In which suburb is Onslow College located?", NULL, "both"),
        (NULL, 2, "The school motto is taken from a verse from…", NULL, "both"),

        -- Johnsonville Questions 31 - 45
        (NULL, 3, "In what year was Johnsonville settled?", NULL, "both"),
        (NULL, 3, "In what year did the railway open in Johnsonville?", NULL, "both"),
        (NULL, 3, "Due to the stockyards in 1894, where cattle and sheep were rallied, what nickname was given to Johnsonville?", NULL, "both"),
        (NULL, 3, "In 1953, Johnsonville amalgamated with the council of which area?", NULL, "both"),
        (NULL, 3, "On the corner of Moorefield and Broderick Roads lies what sports park, due for redevelopment with a $6 million sports centre?", NULL, "both"),
        (NULL, 3, "Johnsonville was named for the early settler Frank…", NULL, "both"),
        (NULL, 3, "Originally, the site where Johnsonville is was originally a track between…", NULL, "multi"),
        (NULL, 3, "The cowtown stockyards were relocated to Raroa Station in what year?", NULL, "both"),
        (NULL, 3, "What is the name of the hub where Johnsonville's new public library is?", NULL, "text"),
        (NULL, 3, "What technology, introduced in 1938, allowed more commuters from Johnsonville's newly-built state houses to Wellington city?", NULL, "multi"),
        (NULL, 3, "The first shopping mall in the Wellington region was built in what decade?", NULL, "multi"),
        (NULL, 3, "What is the common shortened name for Johnsonville?", NULL, "both"),
        (NULL, 3, "The dense native forest in the Johnsonville area included Totara, Rata, Rimu, and…", NULL, "both"),
        (NULL, 3, "What gorge separates Johnsonville from Wellington?", NULL, "both"),
        (NULL, 3, "How many kilometres from Wellington City does Johnsonville lie?", NULL, "both"),
        -- Wellington Questions 46 - 60
        (NULL, 4, "Onslow College is named for the 4th Earl of Onslow, born in what country?", NULL, "both"),
        (NULL, 4, "In the Māori name for Wellington, Te Whanganui-a-Tara, what does ‘whanganui’ mean?", NULL, "both"),
        (NULL, 4, "Matiu (Somes Island) and Mākaro (Ward Island) are named after the daughters of which legendary figure in Māori mythology?", NULL, "both"),
        (NULL, 4, "The former name for Wellington, Port Nicholson, is often shortened to:", NULL, "both"),
        (NULL, 4, "European settlement in Wellington began in the 1920s, starting with an advance party from the ship:", NULL, "both"),
        (NULL, 4, "What is the surname of the colonel who came from Britain to New Zealand in 1839 to purchase land?", NULL, "both"),
        (NULL, 4, "The first homes built by European settlers were constructed in…", NULL, "both"),
        (NULL, 4, "In what year was Wellington declared a city?", NULL, "both"),
        (NULL, 4, "In what year was Wellington declared New Zealand's capital city?", NULL, "both"),
        (NULL, 4, "What was the capital city before Wellington?", NULL, "both"),
        (NULL, 4, "Likely the most powerful earthquake in recorded New Zealand history, the 1855 Wairarapa earthquake that raised the land in the area by 2 to 3 metres reached what magnitude on the Moment scale?", NULL, "multi"),
        (NULL, 4, "Why is Lambton Quay around 100 to 200 metres from Wellington Harbour?", NULL, "both"),
        (NULL, 4, "For whom was Victoria University originally named?", NULL, "multi"),
        (NULL, 4, "When did the Wellington Cable Car begin service?", NULL, "both"),
        (NULL, 4, "Wellington was chosen as the capital city in order to…", NULL, "multi"),
        
        -- School Values Questions 60 - 75
        (NULL, 5, "When adopting the new school vision and values, what type of tree was selected as the emblem to represent them?", NULL, "both"),
        (NULL, 5, "Which value stands for the following? “We work hard to make sure that everyone feels safe”", NULL, "both"),
        (NULL, 5, "In what year were the new school values adopted?", NULL, "both"),
        (NULL, 5, "For the line ‘kia puāwai’ from the school vision, what word best translates the meaning into English?", NULL, "both"),
        (NULL, 5, "Name the missing value: whanau, whenua, whakapapa, community.", NULL, "text"),
        (NULL, 5, "Name the value: “this value is about Onslow College being an extended family, a collective who care. We take the time to know each other, and we work hard to make sure that everyone feels safe”.", NULL, "text"),
        (NULL, 5, "Name the value: “this value is about Onslow College being a place for akōnga to find sustenance so that they can grow and strive. This means we focus on wellbeing and identity in all that we do and say to sustain growth and the ability to thrive”.", NULL, "text"),
        (NULL, 5, "Name the value: “this value is about the layers which make up who we are. The way these layers combine make us unique. It also identifies all that akōnga bring with them each day. The way our families and influences make us who we are and how they connect us”.", NULL, "text"),
        (NULL, 5, "Name the value: “this value is about including and accepting people of different social, socio-economic, learning styles, ethnic, genders, faith, sexual orientation…”.", NULL, "text"),
        (NULL, 5, "Name the value: “this value highlights that Onslow College is a group of people that care about each other and feel they belong together. A group of people who balance the rights of the individual against what is best for the group”.", NULL, "text"),
        (NULL, 5, "Which of these vision statements means 'You bring yourself'?", NULL, "multi"),
        (NULL, 5, "Which of these vision statements means 'Grow'?", NULL, "multi"),
        (NULL, 5, "Which of these vision statements means 'Thrive in the paths you choose'?", NULL, "multi"),
        (NULL, 5, "The school vision is also called The Onslow W…", NULL, "both"),
        (NULL, 5, "What is the Māori term for 'learner'?", NULL, "both");

-- “”

-- Adding Correct Answers 
INSERT INTO correctAnswers(correctAnswerID, questionID, correctAnswer, priorityAnswer)
    -- use NULL for the AUTO_INCREMENT column
    VALUES  
        -- Ngati Toa Answers 
        (NULL, 1, "Ngāti Toa Rangatira", TRUE), (NULL, 1, "Ngati Toa Rangatira", FALSE), (NULL, 1, "Ngāti Toarangatira", FALSE), (NULL, 1, "Ngati Toarangatira", FALSE),
        (NULL, 2, "champion", TRUE), 
        (NULL, 3, "1760s", TRUE), 
        (NULL, 4, "ka mate", TRUE), 
        (NULL, 5, "Death", TRUE), (NULL, 5, "die", FALSE), (NULL, 5, "to die", FALSE),
        (NULL, 6, "4", TRUE),
        (NULL, 7, "2", TRUE), 
        (NULL, 8, "Waikato", TRUE), (NULL, 8, "Kawhia", FALSE), (NULL, 8, "Kāwhia", FALSE),
        (NULL, 9, "Tainui", TRUE),
        (NULL, 10, "Ngāti Mahuta", TRUE), (NULL, 10, "Ngati Mahuta", FALSE),  
        (NULL, 11, "Tribal boundaries", TRUE),  
        (NULL, 12, "Atiawa Toa FM", TRUE),  
        (NULL, 13, "2000", TRUE), (NULL, 13, "2,000", FALSE),  (NULL, 13, "2 000", FALSE),  
        (NULL, 14, "Ora Toa", TRUE),  
        (NULL, 15, "Te Rauparaha", TRUE), 

        -- Onslow College Answers
        (NULL, 16, "1956", TRUE),  
        (NULL, 17, "1970s", TRUE),  
        (NULL, 18, "Eye", TRUE),  
        (NULL, 19, "Latin", TRUE),  
        (NULL, 20, "Whānau", TRUE), (NULL, 20, "whanau", FALSE),  
        (NULL, 21, "Te Kāreti o Onslow", TRUE),  
        (NULL, 22, "The governor of New Zealand", TRUE), 
        (NULL, 23, "Tarikākā", TRUE), (NULL, 23, "Tarikaka", FALSE),  
        (NULL, 24, "2013", TRUE),  
        (NULL, 25, "2021", TRUE),
        (NULL, 26, "Parrot", TRUE), (NULL, 26, "Parrots", FALSE),
        (NULL, 27, "Sheena Millar", TRUE), (NULL, 27, "Miss Millar", FALSE), (NULL, 27, "Ms Millar", FALSE), (NULL, 27, "Mrs Millar", FALSE),
        (NULL, 28, "5 years", TRUE),
        (NULL, 29, "Johnsonville", TRUE),
        (NULL, 30, "The Bible", TRUE), (NULL, 30, "Bible", FALSE),

        -- Johnsonville Answers
        (NULL, 31, "1841", TRUE),
        (NULL, 32, "1886", TRUE),
        (NULL, 33, "Cowtown", TRUE),
        (NULL, 34, "Wellington", TRUE),
        (NULL, 35, "Alex Moore Park", TRUE),(NULL, 35, "Alex Moore", FALSE),
        (NULL, 36, "Johnson", TRUE),
        (NULL, 37, "Wellington and Porirua", TRUE),
        (NULL, 38, "1958", TRUE),
        (NULL, 39, "Waitohi", TRUE),
        (NULL, 40, "Electric train line", TRUE),
        (NULL, 41, "1960s", TRUE),
        (NULL, 42, "J'ville", TRUE),(NULL, 42, "Jville", FALSE),(NULL, 42, "J-ville", FALSE),(NULL, 42, "J Ville", FALSE),
        (NULL, 43, "Hinau", TRUE),(NULL, 43, "Hinau tree", FALSE),(NULL, 43, "Hinau trees", FALSE),
        (NULL, 44, "Ngauranga", TRUE),
        (NULL, 45, "7", TRUE),

        -- Wellington Answers 
        (NULL, 46, "England", TRUE),
        (NULL, 47, "Harbour", TRUE),
        (NULL, 48, "Māui", TRUE),(NULL, 48, "Maui", FALSE),
        (NULL, 49, "Pōneke", TRUE),(NULL, 49, "Poneke", FALSE),(NULL, 49, "Port Nick", FALSE),
        (NULL, 50, "Tory", TRUE),
        (NULL, 51, "Wakefield", TRUE),
        (NULL, 52, "Pito-one", TRUE),(NULL, 52, "Pitoone", FALSE),(NULL, 52, "Petone", FALSE),
        (NULL, 53, "1840", TRUE),
        (NULL, 54, "1865", TRUE),
        (NULL, 55, "Auckland", TRUE),
        (NULL, 56, "8.2", TRUE),
        (NULL, 57, "Lambton Quay is the site of the original harbour before the 1855 earthquake", TRUE),
        (NULL, 58, "Queen Victoria", TRUE),
        (NULL, 59, "1902", TRUE),
        (NULL, 60, "Prevent the South Island becoming its own separate colony", TRUE),

        -- School Value Aswers
        (NULL, 61, "Rata", TRUE),(NULL, 61, "Rata tree", FALSE),
        (NULL, 62, "Whānau", TRUE),(NULL, 62, "Whanau", FALSE),
        (NULL, 63, "2021", TRUE),
        (NULL, 64, "Grow", TRUE),(NULL, 64, "Growth", FALSE),
        (NULL, 65, "Diversity", TRUE),
        (NULL, 66, "Whānau", TRUE),(NULL, 66, "Whanau", FALSE),
        (NULL, 67, "Whenua", TRUE),
        (NULL, 68, "Whakapapa", TRUE),
        (NULL, 69, "Diversity", TRUE),
        (NULL, 70, "Community", TRUE),
        (NULL, 71, "Kei konei ahau", TRUE),
        (NULL, 72, "Kia puāwai", TRUE),
        (NULL, 73, "Haere whakamua", TRUE),
        (NULL, 74, "Way", TRUE),
        (NULL, 75, "Akōnga", TRUE),(NULL, 75, "Akonga", TRUE);
        -- (NULL, , "", TRUE/FALSE),  


-- Adding Incorrect Answers (For Multi-choice)
INSERT INTO incorrectAnswers(incorrectAnswerID, questionID, incorrectAnswer)
    -- use NULL for the AUTO_INCREMENT column
    VALUES  
        -- Ngati Toa Incorrect Answers  
        (NULL, 1, "Ngā Toa Rangatahi"), (NULL, 1, "Ngāti Toa Ruatahi"), (NULL, 1, "Ngāti Toa Ruatira"), 
        (NULL, 2, "warrior"), (NULL, 2, "honest"), (NULL, 2, "brave"), 
        (NULL, 3, "1820s"), (NULL, 3, "1880s"), (NULL, 3, "1940s"),
        (NULL, 5, "Life"), (NULL, 5, "Ball"), (NULL, 5, "War"),
        (NULL, 6, "1"), (NULL, 6, "2"), (NULL, 6, "3"),
        (NULL, 7, "1"), (NULL, 7, "3"), (NULL, 7, "4"),
        (NULL, 8, "Auckland"), (NULL, 8, "Central Plateau"), (NULL, 8, "Manuwatu"), 
        (NULL, 9, "Tokomaru"), (NULL, 9, "Te Arawa"), (NULL, 9, "Tākitimu"), 
        (NULL, 10, "Ngāti Maniapoto"), (NULL, 10, "Ngāti Ira"), (NULL, 10, "Ngāti Tara"), 
        (NULL, 11, "Basket"), (NULL, 11, "Tribal traditions"), (NULL, 11, "Electorate"), 
        (NULL, 12, "Awa FM"), (NULL, 12, "Te Arawa FM"), (NULL, 12, "Radio Tainui"), 
        (NULL, 13, "600"), (NULL, 13, "1200"), (NULL, 13, "2500"), 
        (NULL, 14, "Toa Ora"), (NULL, 14, "Hauroa Toa"), (NULL, 14, "Toa Hauora"), 
        (NULL, 15, "Tupahau"), (NULL, 15, "Tamure"), (NULL, 15, "Toarangatira"),

        -- Onslow College Incorrect Answers
        (NULL, 16, "1962"),(NULL, 16, "1973"),(NULL, 16, "1990"),
        (NULL, 17, "1960s"),(NULL, 17, "1980s"),(NULL, 17, "1990s"),
        (NULL, 18, "Lift"),(NULL, 18, "Mountain"),(NULL, 18, "School"),
        (NULL, 19, "French"),(NULL, 19, "Chinese"),(NULL, 19, "Greek"),
        (NULL, 20, "Iwi"),(NULL, 20, "Hapu"),(NULL, 20, "Tangata"),
        (NULL, 21, "Te Kura Tuarua o Onslow"),(NULL, 21, "Te Kura Kaupapa o Onslow"),(NULL, 21, "Te Kura o Onslow"),
        (NULL, 22, "The college's first school principal"),(NULL, 22, "Prime Minister of New Zealand"),(NULL, 22, "The mayor of Johnsonville"),
        (NULL, 23, "Tarikea"),(NULL, 23, "Taripukeko"),(NULL, 23, "Tarikakapo"),
        (NULL, 24, "2014"),(NULL, 24, "2015"),(NULL, 24, "2016"),
        (NULL, 25, "2020"),(NULL, 25, "2019"),(NULL, 25, "2018"),
        (NULL, 26, "Bird"),(NULL, 26, "Finch"),(NULL, 26, "Fantail"),
        (NULL, 27, "Penny Kinsella"),(NULL, 27, "Warren Henderson"),(NULL, 27, "Janet Glenn"),
        (NULL, 28, "6 months"),(NULL, 28, "1 year"),(NULL, 28, "3 years"),
        (NULL, 29, "Khandallah"),(NULL, 29, "Ngaio"),(NULL, 29, "Crofton Downs"),
        (NULL, 30, "A famous poem"),(NULL, 30, "The Treaty of Waitangi"),(NULL, 30, "A science textbook"),

        -- Johnsonville Incorrect Answers
        (NULL, 31, "1903"), (NULL, 31, "1892"), (NULL, 31, "1884"),  
        (NULL, 32, "1895"), (NULL, 32, "1904"), (NULL, 32, "1923"),  
        (NULL, 33, "Pigland"), (NULL, 33, "Stinkville"), (NULL, 33, "Cowville"),  
        (NULL, 34, "Ngaio"), (NULL, 34, "Khandallah"), (NULL, 34, "Porirua"),  
        (NULL, 35, "Totara Park"), (NULL, 35, "Johnsonville Park"), (NULL, 35, "Newlands Skate Park"),  
        (NULL, 36, "Johnsonville"), (NULL, 36, "Johnstone"), (NULL, 36, "Jonson"),  
        (NULL, 37, "Wellington and the Hutt Valley"), (NULL, 37, "Porirua and the Hutt Valley"), (NULL, 37, "Wellington and Karori"),  
        (NULL, 38, "1953"), (NULL, 38, "1963"), (NULL, 38, "1968"),  
        (NULL, 39, ""), (NULL, 39, ""), (NULL, 39, ""),  -- Question can ONLY be text-box
        (NULL, 40, "Flying cars"), (NULL, 40, "Subway station"), (NULL, 40, "Johnsonville Airport"),  
        (NULL, 41, "1970s"), (NULL, 41, "1980s"), (NULL, 41, "1950s"),  
        (NULL, 42, "Joville"), (NULL, 42, "Johnson"), (NULL, 42, "Johnville"),  
        (NULL, 44, "Pine"), (NULL, 44, "Oak"), (NULL, 44, "Kōwhai"),  
        (NULL, 44, "Manuwatu"), (NULL, 44, "Ōtaki River"), (NULL, 44, "Waiohine"),  
        (NULL, 45, "5"), (NULL, 45, "10"), (NULL, 45, "33"),  

        -- Wellington Incorrect Answers
        (NULL, 46, "Scotland"), (NULL, 46, "Wales"), (NULL, 46, "New Zealand"),  
        (NULL, 47, "River"), (NULL, 47, "Stream"), (NULL, 47, "Sea"),  
        (NULL, 48, "Kupe"), (NULL, 48, "Makeatutara"), (NULL, 48, "Hina"),  
        (NULL, 49, "Port Nico"), (NULL, 49, "Pōniko"), (NULL, 49, "Port Neke"),  
        (NULL, 50, "Aurora"), (NULL, 50, "Cambridge"), (NULL, 50, "Taranaki"),  
        (NULL, 51, "Onslow"), (NULL, 51, "Plimmer"), (NULL, 51, "Lambton"),  
        (NULL, 52, "Johnsonville"), (NULL, 52, "Karori"), (NULL, 52, "Eastbourne"),  
        (NULL, 53, "1910"), (NULL, 53, "2000"), (NULL, 53, "1880"),  
        (NULL, 54, "1910"), (NULL, 54, "1880"), (NULL, 54, "1840"),  
        (NULL, 55, "Russel"), (NULL, 55, "Christchurch"), (NULL, 55, "Palmerston North"),  
        (NULL, 56, "2.4"), (NULL, 56, "4.8"), (NULL, 56, "9.0"),  -- Question 11
        (NULL, 57, "Lambton Quay was originally a different street"), (NULL, 57, "Lambton Quay was originally on a lagoon"), (NULL, 57, "Lambton Quay was originally on a swamp"),  
        (NULL, 58, ""), (NULL, 58, ""), (NULL, 58, ""),  
        (NULL, 59, "1992"), (NULL, 59, "1931"), (NULL, 59, "1950"),  
        (NULL, 60, "Make travel times fairer for people coming from the South Island"), (NULL, 60, "Get away from Auckland's intense humidity"), (NULL, 60, "Enjoy flying kites in the Cook Strait winds"),

        -- School Values Incorrect Answers
        (NULL, 61, "Kōwhai"), (NULL, 61, "Kauri"), (NULL, 61, "Pōhutukawa"),  
        (NULL, 62, "Whenua"), (NULL, 62, "Whakapapa"), (NULL, 62, "Community"),  
        (NULL, 63, "2020"), (NULL, 63, "2019"), (NULL, 63, "2018"),  
        (NULL, 64, "Kindness"), (NULL, 64, "Pride"), (NULL, 64, "Values"),  
        (NULL, 65, ""), (NULL, 65, ""), (NULL, 65, ""), 
        (NULL, 66, ""), (NULL, 66, ""), (NULL, 66, ""), 
        (NULL, 67, ""), (NULL, 67, ""), (NULL, 67, ""),
        (NULL, 68, ""), (NULL, 68, ""), (NULL, 68, ""),
        (NULL, 69, ""), (NULL, 69, ""), (NULL, 69, ""),
        (NULL, 70, ""), (NULL, 70, ""), (NULL, 70, ""),
        (NULL, 71, "Kia puāwai"), (NULL, 71, "Haere whakamua"), (NULL, 71, "All of the above"),
        (NULL, 72, "Kei konei ahau"), (NULL, 72, "Haera whakamua"), (NULL, 72, "All of the above"),
        (NULL, 73, "Kei konei ahau"), (NULL, 73, "Kia puawai"), (NULL, 73, "All of the above"),
        (NULL, 74, "Winds"), (NULL, 74, "Wisdom"), (NULL, 74, "Wabbit"),
        (NULL, 75, "Rangatahi"), (NULL, 75, "Tamariki"), (NULL, 75, "Tauira");


        -- Onslow College Answers 


-- Procedures in SQL

-- Adding a highscore to the database
DELIMITER $$
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `AddHighscore`(IN `@Score` TINYINT UNSIGNED, IN `@LessonID` INT UNSIGNED, IN `@Initials` VARCHAR(3))
    
    INSERT INTO highscores(highscoreID, subjectID, highscore, initials)
        VALUES (NULL, `@LessonID`, `@Score`, `@Initials`)$$

DELIMITER ;

-- Retrieving the top 100 highscores from a lesson 
DELIMITER $$
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `GetHighscore`(IN `@LessonID` INT UNSIGNED)
    
    SELECT * FROM highscores 
    WHERE subjectID = `@LessonID`
    ORDER BY highscore DESC
    LIMIT 100$$

DELIMITER ;




-- Retrieve all subjects from the database
DELIMITER $$
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `GetSubjects`()
    SELECT  subjectID, subjectName, subjectImg
    FROM    subjects$$
DELIMITER ;

-- Retrieve the lesson Subject using lesson id
DELIMITER $$
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `GetSubjectName`(IN `@SubjectID` INT UNSIGNED)
SELECT  subjectName

    FROM    subjects
    WHERE   subjectID = `@SubjectID`$$

DELIMITER ;

-- Retrieve 10 questionsIDs from a subject passed through param
DELIMITER $$
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `GetTenQuestions`(IN `@SubjectID` INT UNSIGNED)

    SELECT  questionID, subjectID, questionText
    FROM    questions
    WHERE   subjectID = `@SubjectID`
    ORDER BY RAND()
    LIMIT 10$$

DELIMITER ;

-- Retrieve a questions questionID 
DELIMITER $$
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `GetQuestionID`(IN `@QuestionText` VARCHAR(1024))

    SELECT  questionID
    FROM    questions
    WHERE   questionText = `@QuestionText`$$

DELIMITER ;

-- Retrieve the questions type 
DELIMITER $$
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `CheckQuestionType` (IN `@Question` VARCHAR(1024))
    
    SELECT questionType
    FROM questions
    WHERE questionText = `@Question`$$

DELIMITER ;

-- Retrieve the correct answer for a question
DELIMITER $$
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `GetCorrectAnswers`(IN `@QuestionID` INT UNSIGNED)

    SELECT *
    FROM correctanswers
    WHERE correctanswers.questionID = `@QuestionID`
    AND correctanswers.priorityAnswer = 1
    OR correctanswers.priorityAnswer = 0
    ORDER BY (CASE WHEN correctanswers.priorityAnswer = 1 THEN 1 ELSE 2 END )
    -- The "1" and "2" are just arbitrary numbers being used to prioritize the rows. Values of 'hello' get "1" so they are ordered before other values.
    LIMIT 1$$

DELIMITER ;

-- Retrieve all correct answers for a question
DELIMITER $$
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `GetAllCorrectAnswers`(IN `@QuestionID` INT UNSIGNED)
    SELECT *
    FROM correctanswers
    WHERE correctanswers.questionID = `@QuestionID`
    ORDER BY (CASE WHEN correctanswers.priorityAnswer = 1 THEN 1 ELSE 2 END )$$
DELIMITER ;


-- Retrieve the questions incorrect answers 
DELIMITER $$
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `GetIncorrectAnswers`(IN `@QuestionID` INT UNSIGNED)
    
    SELECT *
    FROM incorrectanswers
    WHERE incorrectanswers.questionID = `@QuestionID`
    ORDER BY RAND()
    LIMIT 2$$

DELIMITER $$




-- SECURITY MEASURES

--      1: convert SQL queries to *Stored Procerdures* (functions)
--      2: call functions using *Prepared Statements*
--      3: using mysqli_real_escape_string() to remove dangerous chartectors  

