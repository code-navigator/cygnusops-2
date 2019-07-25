import api from '@Api/api';

export default {
  name: 'About',

  data () {
    return {
      text: '',
      revision: ''
    };
  },

  created: async function () {
    const response = await api.get('wp-json/wp/v2/pages/152');
    console.log(response.data.content.rendered);
  }
};
