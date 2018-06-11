import * as React from 'react'
import ArticleStore from './ArticleStore'
import { Article } from './Interfaces'
import ArticleItem from './ArticleItem'


interface ArticleListProps {

}

interface  ArticleListState {
    articles: Article[];
}

export default class ArticleList extends React.PureComponent<ArticleListProps, ArticleListState> {

    private store: ArticleStore = new ArticleStore();

    constructor(props:ArticleListProps){
        super(props);
        this.state = {
            articles: [],
        }
    }

    componentDidMount() {

      let result = fetch('http://localhost:8000/articles')
        .then(response =>{
          if (response.ok) {
            response.json().then(data => {
              this.setState({ articles: data });
            });
          }else{
            console.warn('Network response was not ok.');
          }
      return result;
    })
    .catch(err => console.log(err));
    }

    render () {
        let { articles } = this.state;
        return <div className="container">
                <div className="row">
                  { articles.map( article => {
                      return  <ArticleItem article={article } key={ article.id } />
                  })}
            </div>
        </div>
    }
}
