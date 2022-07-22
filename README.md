# Maintenance-Application

The aim of the project is to implement a responsive web application that may be utilized by UWE students and staff to report faulty equipment within the university campus. This project consits of an initial research that explored the staholders' opinion on the current system that based on contacting UWE IT Services by email as well as feedback on a range of proposed fatures of the maintenance application. The scope of the project consits of designing and developing a MVP that may be presented to UWE ITS as proof of concept.

# Project Description

What your application does,
Why you used the technologies you used,
Some of the challenges you faced and features you hope to implement in the future.

Within UWE, QR codes are used around the whole campus as a way of knowing what lessons are taking place in specific rooms at what time. From this idea, we wanted to implement this into our project as a way of reporting technical issues. Students should be able to locate an issue and report it in a quick manner so the issue can be resolved without it being a major concern. The use of a QR code placed on each piece of technical equipment allows users to scan equipment on the go and report issues when needed.

The flow of the new application is straightforward and establishes the following reporting process:

1	Scan QR code on faulty equipment.

2	Input UWE username.

3	Retrieve further equipment details and a questionnaire related to the issue from the database.

4	Describe the technical issue in your own words.

5	Upload optional photo evidence of the technical issue.

6	Submit a request.

7	Retrieve ticket number from the database.


 
![Wireframe_1(User)](https://user-images.githubusercontent.com/79979904/180199178-2ed540fe-ec46-483e-ae37-6a7db17bffa6.png)


![image](https://user-images.githubusercontent.com/79979904/180201836-8b133397-4820-49df-b896-626180cdc329.png)


![Wireframe_2(ITS)](https://user-images.githubusercontent.com/79979904/180199257-a7e0cba0-b3c7-4dd0-a5fa-112cbea8d825.png)

![image](https://user-images.githubusercontent.com/79979904/180199900-9c748f71-d3f4-4356-8f0d-9c7be29e0e24.png)


![image](https://user-images.githubusercontent.com/79979904/180219145-9caa0eea-bec7-4c74-9fd9-dbe5d1d69083.png)

![DB](https://user-images.githubusercontent.com/79979904/180403775-c80867ab-e18c-4347-8c1e-0e6d25dd29d9.PNG)


How to Use the Project
Provide instructions and examples so users/contributors can use the project. This will make it easy for them in case they encounter a problem – they will always have a place to reference what is expected.

![image](https://user-images.githubusercontent.com/79979904/180199771-f7100d7b-a13f-4c86-a851-07e6424b096f.png)

The above-represented QR Code contains the following URL that redirects the user to the UWE Maintanenace Web Application after scanning the QR Code. 

https://maintenance-appv1.herokuapp.com/login.php?room=FR3Q16&equipmentno=4

The URL contains the domain of the deployed application as well as the file path of the “Login” page of the system. The query string is also equipped with values of “room” and “equipmentno” that represents the details of the number of the scanned equipment and its location within the campus. 
This specific QR Code is placed on equipment that is assigned with the number 4 as an equipment number and it may be located in room 3Q16 of the FR (UWE Frenchay) campus. The application is designed to be able to autofill the equipment number and room number details of the “Login” page by retrieving the appropriate values from the query string.
During the process of reporting a technical issue with the application, the user is redirected to various pages of the system, maintaining the relevant user input as well as the obtained data from the database by passing the appropriate values to the query string.  





