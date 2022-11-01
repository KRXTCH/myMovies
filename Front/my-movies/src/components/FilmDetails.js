import { Component } from "react";

class FilmDetails extends Component {
    constructor(props){
        super(props);
        this.state = {
            datas: [],
            dataLoaded: false
        };
    }

    async componentDidMount() {
        const {filmId} = this.props;

        console.log(filmId)

        await fetch(`https://api.themoviedb.org/3/movie/${filmId}?api_key=30036f330813b6c38ac0afac066a9cf4`)
            .then(response => response.json())
            .then(data => this.setState({ datas: data.results, dataLoaded: true }));
    }

    render() {
        const { datas, dataLoaded } = this.props;

        console.log(datas)

        return (
            <h1>ufhr</h1>
        )
    }
}

export default FilmDetails;