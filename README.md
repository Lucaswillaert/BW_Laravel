# BW_Laravel
 backend web 2IT

 MODELS 
 -------
 Users
    -id
    - username 
    - email 
    - password 
    - is_admin 
    -timestamps
Quotes 
    -id
    -message
    -user_id (weten wie post en eigen post niet gaan liken )
    -timestamps
Likes 
    -id 
    -post_id
    -user_id 
FAQ 
    - ID 
    - Timestamp 
    - Question 
    - Answer 
contact 
    - ID 
    - Username/email 
    - info 

entries 
    - ID
    -message
    -Timestampe
    -Title 

CONTROLLERS
----------
UserController
    - weergeven van profiel 
    - profiel te editen 
PostsController
    + weergeven van alle posts x
    - weergeven van form voor nieuwe post aan te maken x
    - nieuwe post saven 
    - weergeven van form voor post te editen 
    - verwerken van editen 
    - afhandelen van een delete 
    - specifieke posts weergeven 
LikeController 
    - user kan post liken 
aboutController 
    - info over de website 
    - FAQ staat erin waarmee de vragen die gesteld worden een antwoord op is 
    - contact form om te sturen naar de admin 


AdminPage 
    - gebruikers 


12min ! 


wat nog te doen: 
    - bij inlog en uitlog word altijd doorgerefereert naar /dashboard --> dit afzetten 
    - nachecken of journalposts wel blijven 
    - quote posts --> openbaar maken voor elke user en een like knop voorzien en een comment knop 


    - profile page kunnen bewerken en erin zetten dat ook img kan
    - faq voor vragen en eronder een formulier voor een FAQ in te sturen 
