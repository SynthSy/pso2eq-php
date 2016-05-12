# pso2eq-php
A PHP based EQ handler using PSO2es premium notifications.

Embed config.php and eq.php into a php file of your choice (caution can be big sometimes).
You will need a source for the EQ notifications (url or local file) for the EQ notice to work, and 
a server running PHP5.

Sources for EQ handling must be from PSO2es. You will need a way to extract EQ notifications (such as an app like tasker)
and a way to upload these from an Android device to either dropbox (such as DropSync) or a FTP server.

The PHP code interpretes the text string from PSO2es into a readable and working translation on the spot and is easily
configurable to add in more EQ's or add in your own personalized translations.

Multi-ship configurations are unsupported without work. Modifications on the EQ code on the hoster's side must be done 
to use more than 1 ship. This might change over the course of time however.

A demo can be found on http://pso2.arks-visiphone.com/wiki/Main_Page
