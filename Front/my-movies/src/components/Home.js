import "./Home.css";
import FilmList from "./FIlmList";
import { Component, useState } from "react";

import { faPlus } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";


class Home extends Component {
  constructor() {
    super();

    this.state = {
      datas: [],
      dataLoaded: false
    };
  }

  async componentDidMount() {
    await fetch('https://api.themoviedb.org/3/movie/popular?api_key=30036f330813b6c38ac0afac066a9cf4')
        .then(response => response.json())
        .then(data => this.setState({ datas: data.results, dataLoaded: true }));
  }

  render() {
    const { dataLoaded, datas } = this.state;
    
    if(!dataLoaded) {
      return <div><h1>Un instant...</h1></div>
    }
    
    return (
      <section id="Home">
        <div className="home_img" style={{backgroundImage: `linear-gradient(to bottom, rgba(245, 246, 252, 0), rgba(0, 0, 0, 0.8)), url(https://image.tmdb.org/t/p/w400${datas[0].poster_path})`}}>
          <span>
            <h2 className="img_title">Film du moment</h2>
            <h3>{datas[0].title}</h3>
          </span>
          <div>
            <p>Ajouter à une playlist
            <FontAwesomeIcon className="add-playlist-icon" icon={faPlus}/>
            </p>
          </div>          
        </div>
        <div className="filmlist_container">
          <input
            type="text"
            placeholder="Recherche"
            name="searchbar"
            className="searchbar"
          ></input>
          <FilmList title="Playlists populaires"/>
          <FilmList title="Films populaires" datas={datas} dataLoaded={dataLoaded}/>
        </div>
      </section>
    );
  }
}

export default Home;
