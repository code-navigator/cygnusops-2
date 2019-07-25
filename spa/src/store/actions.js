import ProcedureClass from '@Models/procedures'
import api from '@Api/api'

export default {
  // Retrieve data for current procedure
  async getProcedure({commit}) {
    console.log('getProcedure');
    const response = await api.get('wp-json/wp/v2/pages/152');
    this.text = response.data.content.rendered;

    const procedure = new ProcedureClass();
    procedure.title = response.data.title.rendered;
    procedure.content = response.data.content.rendered;

    commit('setProcedure', procedure);
  }
}

// title = '',
//     revision = '',
//     author = '',
//     approval = '',
//     scope = '',
//     restrictions = '',
//     references = '',
//     content = ''
