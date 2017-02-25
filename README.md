# OrgMap
Organization CPT for Wordpress, with a map display.

When ready, it will let you manage a simple rolodex of organizations, categorize them by country and SDG(s) and display a pretty, filterable and sortable country heat map.

## Grunt and stuff
I only use Grunt to generate the CSS from the Less files, in this project. If you want to make changes to the CSS it can be easier to do so in the Less files and just have Grunt build the final css for you.
To have Grunt watch and build the css while working on it, just use the default task
```
grunt
```
  
To explicitily request a css build, run 
```  
grunt less:process
```

## Dependencies
jQuery, Raphael (loaded via CDNJS), [Neveldo's Mapael](https://github.com/neveldo/jQuery-Mapael) (bundled with the plugin)

## SDG Icons
The SDG Icons have been downloaded from [the Official UN SDG Website](http://www.un.org/sustainabledevelopment/sustainable-development-goals/). I strongly recommend that you read the Usage Guidelines before changing the format or the colors of anything SDG-related. 

