# bastille-test
An coding exercise from an agency who's name is a [fortress in Paris](https://en.wikipedia.org/wiki/Bastille). 

## Introduction
Your startup is building a product where users can save URLs with the idea that they can retrieve them later (perhaps when they have time to read). You've been put in charge with writing the server-side implementation of this product through the three problems below.

## Instructions

* You have one hour to complete this assignment (*note that all three problems are building features of the same general product - as a result, they build off of each other and can be utilized in conjunction with each other*).
* Your code is not required to compile or run (this is more of a whiteboard-type exercise).
* You may work in the language of your choice.  Please feel free to use appropriate syntax for the language you choose, including function names. For example, if you choose Python, your function name can read save_url() instead of saveUrl().
* Your solution to all 3 problems should live in one <a href="https://gist.github.com/" target="_blank">GitHub Gist</a>.
* You are only responsible for writing functions that take input, make the appropriate action, and return if necessary (i.e. don’t handle HTTP requests, etc).
* Because your startup's stack does not contain a database or external in-memory store such as Redis yet, you will **need** to store all data in memory.  Please define the datastructures you use as part of this exercise (comments on why you chose what you did are always helpful!).
* If you have any questions or any part of this is unclear to you, please don't hesitate to reach out to me (karthik@bastilleagency.com) and I'll try to get back to you as soon as I can.

## Problem #1: CRUD without the U

Let’s implement Create, Read and Delete operations!

### 1. Create: Implement method named `saveUrl(userToken, URL)`
```  
Input: 
userToken(String), URL(String)

Return: 
A boolean value of whether or not the URL was successfully saved. 
If the URL has been saved for the user previously, this function
should not save it and return false. 
```

### 2. Read: Implement method called `getUrls(userToken)`
```
Input: 
userToken(String)

Return: 
A collection of all the URLs that user has saved, if any.
```

### 3. Delete: Implement method called `removeUrl(userToken, URL)`
```
Input: 
userToken(String), URL(String)

Return: 
A boolean value of whether or not the URL was successfully deleted. 
If the URL to be deleted had never been saved, the function should 
return false.
```

### 4. Bonus: Add test coverage for each of the above three functions. 

Please feel free to use the syntax of any testing framework you choose (i.e. JUnit, Rspec, etc) or testing libraries (i.e. Mockito)
