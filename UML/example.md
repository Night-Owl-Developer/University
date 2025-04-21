```plantuml
@startuml
 -> Bob: Authentication Request
Bob --> Alice: Authentication Response

Kate -> Bob: Another authentication Request
Alice <-- Bob: Another authentication Response
@enduml
```
