# Maintenance-Application

Project's Title
This is the name of the project. It describes the whole project in one sentence, and helps people understand what the main goal and aim of the project is.

Within the UWE learning environment, it can be difficult to report technical issues with different equipment. The reason for this is that many students believe that the process of reporting issues can be challenging. The impact this has, may cause disruption to work progress if the process of reporting is slow. To help students within the university report technical issues to an easy extent, our web application was designed. This prototype includes an application that connects to a database allowing users to scan a QR code and report technical issues based on equipment within the campus.             This application also provides huge satisfaction for IT services as they will be able to issue and locate tickets effectively based on the new system and therefore deal with issues quickly. 

Project Description

What your application does,
Why you used the technologies you used,
Some of the challenges you faced and features you hope to implement in the future.
 
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





