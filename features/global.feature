Feature: Global behavior "Medzoner"
    In order to check the global behavior APP
    As a visitor
    I need to able to access APP

    Background:
        And I add "Authorization" header equal to ""

#------------------------------------------------------------------------------------------
# TEST STANDARD : GET "Home" - Test succeeded
#------------------------------------------------------------------------------------------

    Scenario: [Medzoner - GET_ALL] "Home page"
        When    I send a GET request to ""
        Then    the response status code should be 200

#------------------------------------------------------------------------------------------
# TEST STANDARD : GET "CV" - Test succeeded
#------------------------------------------------------------------------------------------

    Scenario: [Medzoner - GET_ALL] "Home page"
        When    I send a GET request to "/technos"
        Then    the response status code should be 200
