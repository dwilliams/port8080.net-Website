#!/usr/bin/env python

# gen.py
# A script to generate the static pages of the port8080.net website.
# Daniel P Williams <dwilliams@port8080.net>

### IMPORTS ###
import os
import datetime
import json

### GLOBALS ###
posts = []

### CLASSES ###
class Post:
    def __init__( self, inputJSON):
        # If a JSON string is provided, Generate a post using the provided JSON.
        # Otherwise create an empty post.
        self.postID = 0 # Need to figure out the next available ID and set it here.
        self.postName = "Empty Post"
        self.postDate = datetime.date.today()
        self.postTags = [ "A", "B"]
        self.postBodyPreBreak = "This is pre break."
        self.postBodyPostBreak = "This is post break."

    def __repl__( self):
        # Print the JSON output of this object.  Used for debugging purposes.
        return self.jsonify()

    def __str__( self):
        # Print the JSON output of this object.  Used for debugging purposes.
        return self.jsonify()

    def jsonify( self):
        # Return the JSON version of this object.
        tempObj = { "postID": self.postID,
                    "postName": self.postName,
                    "postDate": self.postDate.isoformat(),
                    "postTags": self.postTags,
                    "postBody": {
                        "preBreak": self.postBodyPreBreak,
                        "postBreak": self.postBodyPreBreak}}
        return json.dumps( tempObj)

### FUNCTIONS ###

### MAIN ###
def main():
    # List the files in the "posts" directory
    # For each file, create a post object and add it to the list
    # DEBUG: Print the list of posts
    post = Post( "Invalid JSON string")
    print post

if __name__ == "__main__":
    main()