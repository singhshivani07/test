/**
 * Larsonjuhl
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Larsonjuhl
 * @package     Larsonjuhl_Chatbot
 */
 var config = {
    paths: {
        'sformBuilder': 'Larsonjuhl_DynamicForm/js/formbuilder',
        'sformRender':'Larsonjuhl_DynamicForm/js/formrender'

    },
    shim: {
        'sformBuilder': {'deps': ['jquery']},
        'sformRender': {'deps': ['jquery','sformBuilder']}
    }
};