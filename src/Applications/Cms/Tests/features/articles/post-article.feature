Feature: Post An Article
    As an author
    I need to be able to:
        - create a new article
        - schedule an article for publishing
        - publish an article
        - edit existing articles

    Scenario: posting a full article
        Given I am logged in as "Abed Halawi"
        And I have "Content Manager" access
        And I have the payload:
        """
        {
            "title": "My Title",
            "content": "The Content",
            "cover": "cover-photo-id",
            "photos": [
                "http://photo.url",
                "http://another.photo.link"
            ],
            "author": "author-id"
        }
        """
        When I send a "POST" request to "/articles/store"
        Then the response code should be "200"
        And the repsonse body should be:
        """
        {
            "title": "My Title",
            "slug": "my-title",
            "content": "The Content",
            "cover": [],
            "photos": [
                [],
                []
            ],
            "author": []
        }
        """
