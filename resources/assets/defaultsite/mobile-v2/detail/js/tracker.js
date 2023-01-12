function btnShare() {
    dataLayer.push({
        'event': 'click',
        'feature_name': 'share',
        'feature_location': 'readpage', //feed|feedArticle
        'feature_position': window.kly.gtm.position, ////1|2|3|etc...
        'articleId': window.kly.gtm.articleId,
        'articleTitle': window.kly.gtm.contentTitle,
        'type': window.kly.gtm.type, //text|photo|video|quotes|etc...
        'authors': window.kly.gtm.authors,
        'publicationDate': window.kly.gtm.publicationDate, //2022-10-26
        'publicationTime': window.kly.gtm.publicationTime, //07:34:37
        'template_id': window.kly.gtm.templateId, //1|2|3|4
        'template_name': window.kly.gtm.templateName, //Headline 1|Headline 2|etc..
    });
}

function completion_reading()
{
    dataLayer.push({
        'event': 'view_item_list',
        'feature_name': 'completion_reading',
        'feature_location': 'readpage',
        'feature_position': window.kly.gtm.position,
        'articleId': window.kly.gtm.articleId,
        'articleTitle': window.kly.gtm.contentTitle,
        'type': window.kly.gtm.type, //text|photo|video|quotes|etc...
        'authors': window.kly.gtm.authors,
        'publicationDate': window.kly.gtm.publicationDate, //2022-10-26
        'publicationTime': window.kly.gtm.publicationTime, //07:34:37
        'template_id' : window.kly.gtm.templateId, //1|2|3|4
        'template_name': window.kly.gtm.templateName, //Headline 1|Headline 2|etc.
    })
}

function view_related_tag()
{
    dataLayer.push({
        'event': 'view_item_list',
        'feature_name': 'view_related_tag',
        'feature_location': 'readpage',
        'feature_position': window.kly.gtm.position,
        'articleId': window.kly.gtm.articleId,
        'articleTitle': window.kly.gtm.contentTitle,
        'type': window.kly.gtm.type, //text|photo|video|quotes|etc...
        'authors': window.kly.gtm.authors,
        'publicationDate': window.kly.gtm.publicationDate, //2022-10-26
        'publicationTime': window.kly.gtm.publicationTime, //07:34:37
        'template_id': window.kly.gtm.templateId, //1|2|3|4
        'template_name': window.kly.gtm.templateName, //Headline 1|Headline 2|etc.
    })
}

function view_topic()
{
    dataLayer.push({
        'event': 'view_item_list',
        'feature_name': 'view_topic',
        'feature_location': 'readpage',
        'feature_position': window.kly.gtm.position,
        'articleId': window.kly.gtm.articleId,
        'articleTitle': window.kly.gtm.contentTitle,
        'type': window.kly.gtm.type, //text|photo|video|quotes|etc...
        'authors': window.kly.gtm.authors,
        'publicationDate': window.kly.gtm.publicationDate, //2022-10-26
        'publicationTime': window.kly.gtm.publicationTime, //07:34:37
        'template_id': window.kly.gtm.templateId, //1|2|3|4
        'template_name': window.kly.gtm.templateName, //Headline 1|Headline 2|etc.
    })
}

function view_related_news()
{
    dataLayer.push({
        'event': 'view_item_list',
        'feature_name': 'view_related_news',
        'feature_location': 'readpage',
        'feature_position': window.kly.gtm.position,
        'articleId': window.kly.gtm.articleId,
        'articleTitle': window.kly.gtm.contentTitle,
        'type': window.kly.gtm.type, //text|photo|video|quotes|etc...
        'authors': window.kly.gtm.authors,
        'publicationDate': window.kly.gtm.publicationDate, //2022-10-26
        'publicationTime': window.kly.gtm.publicationTime, //07:34:37
        'template_id': window.kly.gtm.templateId, //1|2|3|4
        'template_name': window.kly.gtm.templateName, //Headline 1|Headline 2|etc.
    })
}

function view_trending()
{
    dataLayer.push({
        'event': 'view_item_list',
        'feature_name': 'view_trending',
        'feature_location': 'readpage',
        'feature_position': window.kly.gtm.position,
        'articleId': window.kly.gtm.articleId,
        'articleTitle': window.kly.gtm.contentTitle,
        'type': window.kly.gtm.type, //text|photo|video|quotes|etc...
        'authors': window.kly.gtm.authors,
        'publicationDate': window.kly.gtm.publicationDate, //2022-10-26
        'publicationTime': window.kly.gtm.publicationTime, //07:34:37
        'template_id': window.kly.gtm.templateId, //1|2|3|4
        'template_name': window.kly.gtm.templateName, //Headline 1|Headline 2|etc.
    })
}

function view_latest_news()
{
    dataLayer.push({
        'event': 'view_item_list',
        'feature_name': 'view_latest_news',
        'feature_location': 'readpage',
        'feature_position': window.kly.gtm.position,
        'articleId': window.kly.gtm.articleId,
        'articleTitle': window.kly.gtm.contentTitle,
        'type': window.kly.gtm.type, //text|photo|video|quotes|etc...
        'authors': window.kly.gtm.authors,
        'publicationDate': window.kly.gtm.publicationDate, //2022-10-26
        'publicationTime': window.kly.gtm.publicationTime, //07:34:37
        'template_id': window.kly.gtm.templateId, //1|2|3|4
        'template_name': window.kly.gtm.templateName, //Headline 1|Headline 2|etc.
    })
}
