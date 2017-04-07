# Stringintelligenz
Inclusive WordPress localization

**Stringintelligenz** is a feature project that aims to bring inclusive language to WordPress locales.

#### Example case: German
German has three genders: masculine, feminine and neuter. Word endings often reveal grammatical gender—particularly for individuals, groups of individuals, job descriptions and the like:

```
der Benutzer      – the user – male, also used “generically”
ein Benutzer      – a user   – male, also used “generically”
die Benutzer      – users    – male, also used “generically”
die Benutzerin    – the user – female
eine Benutzerin   – a user   – female
die Benutzerinnen – users    – female
```

According to written German grammar, a “generic masculine” is meant to include individuals of any gender. However, studies have shown human perception does not necessarily work that way.

According to psycho-linguistic studies conducted for German, grammatically male terms are understood primarily as male, not male and/or female characters. In WordPress this would apply to terms like `Benutzer` (user), `Entwickler` (developer), `Autor` (author), `Administrator` (administrator) and many more.

#### Example: generically masculine captions

![German localization for “lead developer” implies Helen Hou-Sandí would be a male developer.](/screenshot-2.png)
_Helen was captioned as a male developer in German._

A quite illustrative example is the caption `Leitender Entwickler` (Lead Developer, here: singular) on WordPress’ credits page. German translations clearly imply a **male individual** here. Yet that caption gets applied to each WordPress Lead Developer individually, including Helen Hou-Sandí who is a woman.

The appropriate caption for Helen would be `Leitende Entwicklerin` in German. In this particular case (like often times) we cannot apply proper grammatical gender to each Lead Developer individually due to technical restrictions.

**Update:** The translation `Leitender Entwickler` meanwhile has been changed into the functional equivalent `Leitende Entwicklung` (reverse translated into `Lead Development`) in de_DE core files.

#### Solutions: gender shortcuts
German offers several widely spread solutions to address this problem in written language:

- `Leitende/r Entwickler/-in` (slash + dash)
- `Leitende EntwicklerIn` (“Binnen-I”)
- `Leitende_r Entwickler_in` (“Gender Gap”)
- `Leitende*r Entwickler*in` (“Gender Star”)

All of these short forms would be read and understood in the context of the individual they got applied to.

**Helen** would be understood as female:
```
Leitende Entwicklerin
```
while **Mark** would be understood as male:
```
Leitender Entwickler
```

**Plural forms** would be understood as both, female and male:
```
Leitende Entwickler/-innen
```
would be read as lead developers (female and male):
```
Leitende Entwicklerinnen und Entwickler
```

_**Note:** It is often recommendable to try simplifying and “neutralizing” an expression first instead of using gender suffixes. In many cases phrasing can be adjusted to rely on gender-neutral instead of gender-sensitive expressions._
