# Test configuration

I set up sqlite in memory for testing. The configuration is in the phpunit.xml file.
```
   <env name="DB_CONNECTION" value="sqlite"/>
   <env name="DB_DATABASE" value=":memory:"/>
```
