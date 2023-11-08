import { Vue }  from  "vue";

Vue.filter("cutText",  function(value,  length,  suffix)  {
    if  (value.length  >  length)  {
        return  value.substring(0,  length)  +  suffix;
    }  else  {
        return  value;
    }
});
