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
After implementing a Model, Controller and a Route it did work as explained.

- Do I understand the generated code?
There was no code generated.

- Which parts were unclear?
None it was written out pretty clearly.

- What errors or shortcomings did I discover?
None.

- How did I check/verify that?
I really didn't have to since it did not write code it just provided me a scheme on how laravel handles information.

### Own Adjustments
I didn't have to adjust anything, I did create a Model called: Activity and a Controller name: ActivityController which handle parsing over the data of the activities table in the sqlite database.

### Result
I have gained the knowledge on how laravel parses information from database -> controllers -> views

## 2026-09-02

### Task
How I can return an ICS request that your device will recognize. 
On mobile: opening calendar app 

### Prompt
how can I return a view that is an ics feed, that your mobile device will recognize and open into the calendar app 
### Output Summary
A brief explanation on how events, responses work in laravel and a possible solution for my question.

### Critical Evaluation
Answer at least the following questions:

- Was the solution correct?
Yes, I have created a function in the ActivityController which then created an ics file that ended up working.
- Do I understand the generated code?
Yes, it's honestly pretty simple. it uses a response class which sends a response back to the client.
- Which parts were unclear?
A bit about using the routing but it was not that bad to figure out myself.
- What errors or shortcomings did I discover?
I only had an error when defining a "<a>" tag on a page.
- How did I check/verify that?
I tested with Tiemen to see if it worked, it did.

### Own Adjustments
What changes did you make yourself?
I typed the function myself implementing a response that the output had shown.

### Result
1. Controller Setup
    Format your event data into a valid RFC 5545 iCalendar string.
    Return a raw response using response($icsContent, 200, $headers).
    Set critical headers:
        'Content-Type' => 'text/calendar; charset=utf-8'
        'Content-Disposition' => 'inline; filename="event.ics"'

2. Routing & Blade Links
    Define the route with a name in routes/web.php:
    Route::get('/calendar/event.ics', [ActivityController::class, 'generate_ics_feed'])->name('calendar.event');

    Call the route in Blade using its name, not its path:
    route('calendar.event')

3. Cross-Platform Protocol Handling
    https://: Safe for all devices. Mobile browsers read the text/calendar header and open the Calendar app, while desktop browsers cleanly download the file.

    webcal://: Best for mobile calendar subscriptions, but causes "unknown protocol" errors on desktops without a registered calendar application.

    Best Practice: Serve https:// by default, or conditionally swap to webcal:// only on mobile devices via JavaScript.

## 2026-09-04
### Task
I want to know if I am following the right structure in the ICS file im generating.

### Prompt
Is there anything off in this ICS file, my calendar doesn't accept this structure. Why?
*followed by ics file*

### Output Summary
It told met that the only correct timestamp was DTSTAMP which had the structure YYYYMMDDTHHMMSS, the DTSTART and DTEND had just datetime values. The version of the ISO was 1.0 which followed an older structure. The new one was version 2.0.

### Critical Evaluation
Answer at least the following questions:

- Was the solution correct?
Yes, I have changed the database parser and now my calendar recognizes it.

- Do I understand the generated code?
It didn't generate anything besides giving me information.
- Which parts were unclear?
Well it explained a pretty simple thing, it was just the version which means what parsed it uses old one is 1.0 new one 2.0 and just time format.
- What errors or shortcomings did I discover?
Well I did not have a correct structure, but once I fixed the timestamp that was appended into the database it was all fixed. 
- How did I check/verify that?
I opened the ICS file and tried to put it into my agenda/calendar app

### Own Adjustments
I didnt change anything the ai generated, I did use the information given. 

### Result
An explanation of how the ICS handles information.

## 2026-09-04

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
## 2026-09-04

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
## 2026-09-04

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
## 2026-09-04

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
