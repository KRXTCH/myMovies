import FilmList from "./movies/FilmList";
import { Component, useState } from "react";

class Home extends Component {
	constructor() {
		super();

		this.state = {
			datas: [],
			dataLoaded: false,
			searchValue: "",
			tempSearchValue: "",
			searchData: [],
		};
	}

	async componentDidMount() {
		await fetch(
			"https://api.themoviedb.org/3/movie/popular?api_key=30036f330813b6c38ac0afac066a9cf4"
		)
			.then((response) => response.json())
			.then((data) =>
				this.setState({ datas: data.results, dataLoaded: true })
			);
	}

	handleChanged = (e) => {
		this.setState({ searchValue: e.target.value });
	};

	onEnter = (e) => {
		const url = `https://api.themoviedb.org/3/search/movie?api_key=30036f330813b6c38ac0afac066a9cf4&query=${this.state.searchValue}&language=fr-FR&page=1&include_adult=true`;

		if (e.key == "Enter") {
			if (
				this.state.searchValue.length > 1 &&
				this.state.searchValue != this.state.tempSearchValue
			) {
				this.fetchData(url);
				this.setState({ tempSearchValue: this.state.searchValue });
			}
		}
	};

	fetchData = async (url) => {
		try {
			const response = await fetch(url);
			const json = await response.json();
			this.setState({ searchData: json });
		} catch (error) {
			console.log("error", error);
		}
	};

	render() {
		const { dataLoaded, datas, searchData, searchValue } = this.state;

		if (!dataLoaded) {
			return (
				<div>
					<h1>Un instant...</h1>
				</div>
			);
		}

		function manageHomeDisplay() {
			if (
				searchValue.length > 0 &&
				searchData.length == undefined &&
				searchData != null
			) {
				return (
					<FilmList
						title="Résultat de la recherche"
						datas={searchData.results}
						dataLoaded={true}
					/>
				);
			} else {
				return (
					<section>
						<FilmList title="Playlists populaires" />
						<FilmList
							title="Films populaires"
							datas={datas}
							dataLoaded={dataLoaded}
						/>
					</section>
				);
			}
		}

		return (
			<section id="Home">
				<div
					className="home_img"
					style={{
						backgroundImage: `linear-gradient(to bottom, rgba(245, 246, 252, 0), rgba(0, 0, 0, 0.8)), url(https://image.tmdb.org/t/p/w400${datas[0].poster_path})`,
					}}
				>
					<span>
						<h2 className="img_title">Film du moment</h2>
						<h3>{datas[0].title}</h3>
					</span>
					<div>
						<p>Ajouter à une playlist</p>
					</div>
				</div>
				<div className="filmlist_container">
					<input
						type="text"
						placeholder="Recherche"
						name="searchbar"
						className="searchbar"
						value={this.state.searchValue}
						onChange={this.handleChanged}
						onKeyDown={this.onEnter}
					></input>
					{manageHomeDisplay()}
				</div>
			</section>
		);
	}
}

export default Home;
