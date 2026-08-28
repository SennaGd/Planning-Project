# AI Logbook
## 2026-08-21

### Task
What do you want to achieve?

### Prompt
Which prompt did you use?

*Can you give me an example of a Model View Controller that's relatively basic?*


### Output Summary

Briefly describe what the AI generated.

The AI explained the Model-View-Controller (MVC) architecture conceptually (without providing raw code) using a practical example: a basic **User Profile Page**.

1. **Model (Data & Logic):** Manages the data and business rules.
   * *Example:* A User object storing attributes like `username`, `email`, and `bio`. It includes logic to check if an email address format is valid or to save updated user details to a database.

2. **View (User Interface & Presentation):** Displays data to the user and captures user interactions.
   * *Example:* The HTML/CSS layout of the profile page containing text labels for the username and email, alongside an "Edit Profile" button and input fields. It does not know where the data comes from; it only renders what it is given.

3. **Controller (Mediator & Flow Control):** Listens to user inputs from the View, updates the Model, and determines which View to display next.
   * *Example:* When a user clicks "Save Profile", the Controller takes the text from the form fields, instructs the Model to validate and save the updated information, and then commands the View to display a "Profile Saved Successfully" message.

**Workflow Diagram:**
[User Interaction] ➔ (View) ➔ triggers request ➔ (Controller) ➔ updates ➔ (Model)
                                                 │                            │
                                                 └──────── renders new ───────┴─► (View)

### Critical Evaluation
Answer at least the following questions:

- Was the solution correct?
Since an MVC has a "Model", "View" and "Controller" I would agree that it provided the right information.

- Do I understand the generated code?
No code generated here.

- Which parts were unclear?
I'd say none here, since it simply gives a description 
- What errors or shortcomings did I discover?

- How did I check/verify that?
    Checking other links

Which changes did you make yourself?

Since it used an example I couldn't make a MVC myself based on the given information. So I have used this as an template to help me develop my own.

### Result
What did the AI interaction ultimately deliver?
(brief summary)

An example of a Model-View-Controller.


## 2026-08-27

### Task
Create scenarios and use cases based on the functional design and use case diagram of the Planning Dashboard Project.

### Prompt
I have provided you with a project plan and functional design, and now I need to create the scenarios. Could you make these for me based on the use-case.png and the provided information? Please note: the scenarios must include these columns: Name, Version, Actor, Precondition, Scenario (steps to complete the action), Exceptions, Non-functional requirements, Postcondition

### Output Summary
An initial overview table mapping all use cases from the diagram (such as *View activities*, *Log in*, *Create activity*) to structured scenario descriptions.


### Critical Evaluation
Answer at least the following questions:

- Was the solution correct?
No, it was not formatted correctly

- Do I understand the generated code?
The answer given was clean and concise.
- Which parts were unclear? 
None, the formatting was only wrong here.
- What errors or shortcomings did I discover?
None
- How did I check/verify that?
I looked over the text, saw that it fell short on the tables. 
It did not have them.

### Own Adjustments
What changes did you make yourself?
I have not used the data given here.

### Result
What did the AI interaction ultimately deliver?
(brief summary)
Text based scenarios for the given use case, not in the right format.


## 2026-08-27
### Task
Reformat the scenario overviews into individual Markdown tables per use case.

### Prompt
Please format as a .md table with the layout: | name | View activities | | version | student | ... and so on

### Output Summary
The generated scenarios were restructured into multiple vertical key-value tables with fields such as Name, Version, Actor, Precondition, Scenario, Exceptions, Non-functional requirements, and Postcondition.

### Critical Evaluation
Answer at least the following questions:

- Was the solution correct?
No but close, it ended up generating the tables correctly but I could not copy the text given and put it in an '.md'format. So the end result was wrong here.
- Do I understand the generated code?
Yes same as the previous promt, it did not have much that was wrong.
- Which parts were unclear?
None
- What errors or shortcomings did I discover?
It fell short in usability, I could not fetch the given tables and use these.
- How did I check/verify that?
I tried to copy and paste it inside the 'Docs/functioneel-ontwerp.md' but the tables did not parse correctly.

### Own Adjustments
What changes did you make yourself?

None

### Result
What did the AI interaction ultimately deliver?
(brief summary)

Formatted scenarios that showed correctly inside the ai environment but not in a plain text file 


## 2026-08-27
### Task
Deliver the output explicitly as a '.md' code block.

### Prompt
send it in formatted code block.

### Output Summary
The entire output of the ai's previous prompt was now enclosed in one code block so that I could parse it to the 'Docs/functioneel-ontwerp.md'

### Critical Evaluation
Answer at least the following questions:

- Was the solution correct?
Partially.
- Do I understand the generated code?
Yes, the content is the same as the previous 2 promts. 
- Which parts were unclear?
None.
- What errors or shortcomings did I discover?
It put use cases / scenarios together which did make the entire response smaller but also wrong.
- How did I check/verify that?
I read the given data

### Own Adjustments
What changes did you make yourself?

I prompted to keep the scenarios seperate and not combine them.

### Result
What did the AI interaction ultimately deliver?
(brief summary)

A good parsed code block with combined scenarios which ended up falling short from my requirements.


## 2026-08-27
### Task
Make sure the scenarios are not combined together.

### Prompt
keep all scenarios separate from the use-case!

### Output Summary
All 15 individual use cases from the use case diagram were split into their own separate code blocks (such as *Edit activity*, *Delete activity*, *Generate QR Code*, *Scan QR Code*, *Create class*, etc.).

### Critical Evaluation
Answer at least the following questions:

- Was the solution correct?
Yes, it parsed it correctly this time.
- Do I understand the generated code?
Yes, it is easy to read.
- Which parts were unclear?
None.
- What errors or shortcomings did I discover?
Zero errors or shortcomings.
- How did I check/verify that?
I read over the given response checked all scenarios by reading over them.

### Own Adjustments
What changes did you make yourself?
Only some informating in preconditions, scenarios, uitzonderingen, niet-functionele eisen, postconditie. 

### Result
What did the AI interaction ultimately deliver?
(brief summary)

A complete scenario that is fully supported in '.md'


## 2026-08-28

### Task
Understand how data is parsed throughout Laravel.

### Prompt
how can i parse information from sqlite database to route to page in laravel?

### Output Summary
It explained how the model > view > controller system works, as well for migrations.

### Critical Evaluation
Answer at least the following questions:

- Was the solution correct?
- Do I understand the generated code?
- Which parts were unclear?
- What errors or shortcomings did I discover?
- How did I check/verify that?

### Own Adjustments
What changes did you make yourself?

### Result

What did the AI interaction ultimately deliver?
(brief summary)


## 2026-08-28

### Task
What do you want to achieve?

### Prompt
Which prompt did you use?

### Output Summary
Briefly describe what the AI generated.

### Critical Evaluation
Answer at least the following questions:

- Was the solution correct?
- Do I understand the generated code?
- Which parts were unclear?
- What errors or shortcomings did I discover?
- How did I check/verify that?

### Own Adjustments
What changes did you make yourself?

### Result

What did the AI interaction ultimately deliver?
(brief summary)
