[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Dandelion/functions?utm_source=RapidAPIGitHub_DandelionFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Dandelion Package
Dandelion
* Domain: [Dandelion](http://dandelion.com)
* Credentials: accessToken

## How to get credentials: 
0. Go to [Dandelion website](dandelion.com)
1. Register or log in
2. Go to [Dashboard](https://dandelion.eu/profile/dashboard/) to get your accessToken.

## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## Dandelion.extractEntity
Automatically tag your texts, extracting Wikipedia entities and enriching your data.

| Field        | Type       | Description
|--------------|------------|----------
| accessToken  | credentials| Access token obtained from Dandelion
| sourceType   | String     | Type of the input: text,url,html,html_fragment
| source       | String     | request input
| lang         | Select     | The language of the text to be annotated. Possible values: de , en , es , fr , it , pt , auto
| minConfidence| String     | Confidence is a numeric estimation of the quality of the annotation, which ranges between 0 and 1.
| minLength    | Number     | With this parameter you can remove those entities having a spot shorter than a minimum length.
| socialHashtag| Boolean    | With this parameter you enable special mention parsing to correctly analyze tweets and facebook posts.
| include      | List       | Returns more information on annotated entities. Coma separated: types, categories, abstract, image, lod, alternate_labels
| extraTypes   | Select     | Returns more information on annotated entities. Possible values: phone, vat
| country      | String     | This parameter specifies the country which we assume VAT and telephone numbers to be coming from.  Possible values: AD, AE, AM, AO, AQ, AR, AU, BB, BR, BS, BY, CA, CH, CL, CN, CX, DE, FR, GB, HU, IT, JP, KR, MX, NZ, PG, PL, RE, SE, SG, US, YT, ZW
| customSpots  | String     | Enable specific user-defined spots to be used when annotating the text. You can define your own spots or use someone else's ones if they shared the spots-ID with you.
| epsilon      | String     | This parameter defines whether the Entity Extraction API should rely more on the context or favor more common topics to discover entities. Using an higher value favors more common topics, this may lead to better results when processing tweets or other fragmented inputs where the context is not always reliable. Accepted values: 0.0 .. 0.5

## Dandelion.getTextSimilarity
Compare two sentences and get a score of their semantic similarity.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| Access token obtained from Dandelion
| sourceType | Select     | Type of the input: text,url,html,html_fragment
| source1    | String     | request input
| source2    | String     | request input
| lang       | Select     | The language of the text to be annotated. Possible values: de , en , es , fr , it , pt , auto
| bow        | String     | The Text Similarity API normally uses a semantic algorithm for computing similarity of texts. It is possible, however, to use a more classical syntactic algorithm where the semantic one fails. This can be done with this parameter. Possible values: always , one_empty , both_empty , never

## Dandelion.detectLanguages
Detects language of the source.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| Access token obtained from Dandelion
| sourceType | Select     | Type of the input: text,url,html,html_fragment
| source     | String     | Request input
| clean      | Boolean    | Set this parameter to true if you want the text to be cleaned from urls, email addresses, hashtags, and more, before being processed.

## Dandelion.identifyTextSentiments
This API analyses a text and tells whether the expressed opinion is positive, negative, or neutral. Given a short sentence, it returns a label representing the identified sentiment, along with a numeric score ranging from strongly positive (1.0) to extremely negative (-1.0).

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| Access token obtained from Dandelion
| sourceType | Select     | Type of the input: text,url,html,html_fragment
| source     | String     | Request input
| lang       | Select     | Possible values: en, it, auto

## Dandelion.searchWikipages
Looking for Wikipedia pages but don't know their exact title? We can help you to search for the page you want.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| Access token obtained from Dandelion
| text       | String     | Request input
| lang       | Select     | Possible values: en, de, es, fr, it, pt
| limit      | Number     | Restricts the output to the first N results.
| query      | String     | With this parameter you can choose the behaviour of the search: full, prefix
| include    | List       | Returns more information on annotated entities. Coma separated: types, categories, abstract, image, lod, alternate_labels

## Dandelion.createModel
Create a new model

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| Access token obtained from Dandelion
| model      | JSON       | Formed model. Example: {"lang": "en", "description": "basic", "categories": [{"name": "sport", "topics": {"http://en.wikipedia.org/wiki/Sport": 2}}] }

## Dandelion.getSingleModel
Read a specific model

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| Access token obtained from Dandelion
| modelId    | String     | Id of existing model

## Dandelion.getModels
List all your models

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| Access token obtained from Dandelion

## Dandelion.updateModel
Update an existing model

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| Access token obtained from Dandelion
| modelId    | String     | Id of existing model
| model      | JSON       | Formed model. Example: {"lang": "en", "description": "basic", "categories": [{"name": "sport", "topics": {"http://en.wikipedia.org/wiki/Sport": 2}}] }

## Dandelion.classifyText
This API classifies short documents into a set of user-defined classes. 

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| Access token obtained from Dandelion
| sourceType | Select     | Type of the input: text,url,html,html_fragment
| source     | String     | Request input
| modelId    | String     | The unique ID of the model you want to use. 
| minScore   | String     | Return those categories that get a score above this threshold. 

## Dandelion.deleteModel
Delete a specific model

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| Access token obtained from Dandelion
| modelId    | String     | Id of existing model

