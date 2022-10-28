import "./Home.css";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import FilmList from "./FIlmList";
import { Component, useState } from "react";

class Home extends Component {
  constructor() {
    super();
    this.state = {
      datas: Array,
    };
  }

  componentDidMount() {
    fetch('https://api.themoviedb.org/3/movie/popular?api_key=30036f330813b6c38ac0afac066a9cf4')
        .then(response => response.json())
        .then(data => this.setState({ datas: data.results }));
  }

  render() {
    return (
      <section id="Home">
        <div className="img">
          {/* <FontAwesomeIcon icon="fa-solid fa-plus" /> */}
        </div>
        <div className="filmlist_container">
          <input
            type="text"
            placeholder="Recherche"
            name="searchbar"
            className="searchbar"
          ></input>
          <FilmList title="Playlists populaires" datas={this.state.datas} />
          <FilmList title="Films populaires" />
        </div>
      </section>
    );
  }
}

export default Home;
