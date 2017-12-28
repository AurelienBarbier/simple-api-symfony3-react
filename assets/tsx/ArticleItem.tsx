import * as React from 'react'
import { Article } from './Interfaces'


interface Props {
    article: Article;
}

interface State {

}

export default class ArticleItem extends React.Component<Props, State> {


    render () {
        let { article } = this.props;
        console.log(article);
        return <div className="card">
            <div className="card-content">
                <div className="media">
                    <div className="media-left">
                        <figure className="image is-48x48">
                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image"/>
                        </figure>
                    </div>
                    <div className="media-content">
                        <p className="title is-4">{ article.title }</p>
                        <p className="subtitle is-6">@johnsmith</p>
                    </div>
                </div>

                <div className="content">
                    { article.content }
                    <a href="#">#css</a> <a href="#">#responsive</a>
                    <br/>
                        <time>11:09 PM - 1 Jan 2016</time>
                </div>
            </div>
        </div>

    }
}
