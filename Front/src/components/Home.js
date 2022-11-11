import { Component } from "react";
import { Breadcrumbs } from "@mui/material";

import Plus from "../asset/icons/plus-solid.svg";
import FilmList from "./movies/FilmList";
import axios from "axios";
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
		const url = process.env.API + "movies/popular";
		var self = this;
		await axios
			.get(url)
			.then(function (response) {
				console.log(response.data);
				self.setState({
					datas: response.data.results,
					dataLoaded: true,
				});
			})
			.catch(function (error) {
				// handle error
				console.log(error);
			})
			.then(function () {});
	}

	handleChanged = (e) => {
		this.setState({ searchValue: e.target.value });
	};

	onEnter = (e) => {
		const url = process.env.API + `movies/search/${this.state.searchValue}`;
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
			var self = this;
			axios
				.get(url)
				.then(function (response) {
					console.log(response.data);
					self.setState({
						searchData: response.data,
					});
				})
				.catch(function (error) {
					// handle error
					console.log(error);
				})
				.then(function () {});
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
						<h1 className="img_title">Film du moment</h1>
						<h3 className="most_popular_film_title">
							{datas[0].title}
						</h3>
					</span>
					<div>
						<p>
							Ajouter à une playlist
							<img
								className="add-playlist-icon icons icons-w"
								src={Plus}
							/>
						</p>
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
					<Breadcrumbs
						className="breadcrumb"
						aria-label="breadcrumb"
					>
						<p>Accueil</p>
					</Breadcrumbs>
					{manageHomeDisplay()}
				</div>
			</section>
		);
	}
}

export default Home;
